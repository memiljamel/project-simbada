<?php

namespace App\Http\Controllers;

use App\Enums\PermissionEnum;
use App\Enums\RoleEnum;
use App\Http\Requests\StoreAssetRequest;
use App\Http\Requests\UpdateAssetRequest;
use App\Models\Asset;
use App\Models\AssetAttachment;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Distributor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class AssetActiveController extends Controller
{
    /**
     * Instantiate a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('role:'.RoleEnum::Administrator->value.'|'.RoleEnum::Custom->value);
        $this->middleware('permission:'.PermissionEnum::ReadAssets->value)->only(['index', 'show']);
        $this->middleware('permission:'.PermissionEnum::CreateAssets->value)->only(['create', 'store']);
        $this->middleware('permission:'.PermissionEnum::UpdateAssets->value)->only(['edit', 'update']);
        $this->middleware('permission:'.PermissionEnum::DeleteAssets->value)->only(['destroy']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $page = $request->query('page');
        $search = $request->query('search');

        $assets = Asset::active(true)->with(['category', 'brand', 'latestHistory'])
            ->when($search, function (Builder $query, ?string $search) {
                $query->where('code', 'LIKE', "%{$search}%")
                    ->orWhere('name', 'LIKE', "%{$search}%")
                    ->orWhere('type', 'LIKE', "%{$search}%")
                    ->orWhere('purchase_year', 'LIKE', "%{$search}%")
                    ->orWhereHas('category', function (Builder $query) use ($search) {
                        $query->where('name', 'LIKE', "%{$search}%");
                    })
                    ->orWhereHas('brand', function (Builder $query) use ($search) {
                        $query->where('name', 'LIKE', "%{$search}%");
                    })
                    ->orWhereHas('latestHistory', function (Builder $query) use ($search) {
                        $query->where('date_from', 'LIKE', "%{$search}%")
                            ->orWhereHas('responsiblePerson', function (Builder $query) use ($search) {
                                $query->where('name', 'LIKE', "%{$search}%");
                            })
                            ->orWhereHas('location', function (Builder $query) use ($search) {
                                $query->where('name', 'LIKE', "%{$search}%");
                            });
                    });
            })
            ->latest()
            ->paginate()
            ->withQueryString();

        if ($page > $assets->lastPage() && $page > 1) {
            abort(404);
        }

        return view('asset-active.index', compact('assets', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categories = Category::select(['name'])
            ->where('name', '!=', 'None')
            ->orderBy('name')
            ->get();

        $brands = Brand::orderBy('name')
            ->pluck('name')
            ->toArray();

        $distributors = Distributor::orderBy('name')
            ->pluck('name')
            ->toArray();

        return view('asset-active.create', compact('categories', 'brands', 'distributors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAssetRequest $request): RedirectResponse
    {
        DB::transaction(function () use ($request) {
            $category = Category::firstOrCreate([
                'name' => $request->input('category'),
            ]);

            $brand = Brand::firstOrCreate([
                'name' => $request->input('brand'),
            ]);

            $asset = new Asset;
            $asset->code = $request->input('code');
            $asset->name = $request->input('name');
            $asset->category_id = $category->getAttribute('id');
            $asset->serial_number = $request->input('serial_number');
            $asset->brand_id = $brand->getAttribute('id');
            $asset->type = $request->input('type');
            $asset->size = $request->input('size');
            $asset->material = $request->input('material');
            $asset->purchase_year = $request->input('purchase_year');
            $asset->frame_number = $request->input('frame_number');
            $asset->engine_number = $request->input('engine_number');
            $asset->police_number = $request->input('police_number');
            $asset->bpkb_number = $request->input('bpkb_number');
            $asset->origin = $request->input('origin');
            $asset->unit_price = $request->input('unit_price');
            $asset->status = $request->input('status');
            $asset->notes = $request->input('notes');

            if (! $request->filled('distributor')) {
                $asset->distributor_id = $request->input('distributor');
            } else {
                $distributor = Distributor::firstOrCreate([
                    'name' => $request->input('distributor'),
                ]);

                $asset->distributor_id = $distributor->getAttribute('id');
            }

            if ($request->hasFile('photo')) {
                $asset->photo = Storage::disk('public')->put(
                    'photos',
                    $request->file('photo'),
                );
            }

            $asset->qr_code = 'qr-codes/'.str()->random(40).'.png';
            $asset->save();

            Storage::disk('public')->put(
                $asset->qr_code,
                QrCode::format('png')
                    ->margin(1)
                    ->size(512)
                    ->generate(route('asset-details.scans', $asset->id)),
            );

            if ($request->hasFile('attachments')) {
                $attachments = $request->file('attachments');

                foreach ($attachments as $filename) {
                    $attachment = new AssetAttachment;
                    $attachment->filename = Storage::disk('public')->putFileAs(
                        'attachments',
                        $filename,
                        time().'_'.$filename->getClientOriginalName(),
                    );
                    $attachment->asset_id = $asset->getAttribute('id');
                    $attachment->save();
                }
            }
        });

        return redirect()->route('asset-active.index')
            ->with('message', 'The asset has been created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Asset $asset): View
    {
        return view('asset-active.show', compact('asset'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Asset $asset): View
    {
        $categories = Category::select(['name'])
            ->where('name', '!=', 'None')
            ->orderBy('name')
            ->get();

        $brands = Brand::orderBy('name')
            ->pluck('name')
            ->toArray();

        $distributors = Distributor::orderBy('name')
            ->pluck('name')
            ->toArray();

        return view('asset-active.edit', compact('asset', 'categories', 'brands', 'distributors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAssetRequest $request, Asset $asset): RedirectResponse
    {
        DB::transaction(function () use ($request, $asset) {
            $category = Category::firstOrCreate([
                'name' => $request->input('category'),
            ]);

            $brand = Brand::firstOrCreate([
                'name' => $request->input('brand'),
            ]);

            $asset->code = $request->input('code');
            $asset->name = $request->input('name');
            $asset->category_id = $category->getAttribute('id');
            $asset->serial_number = $request->input('serial_number');
            $asset->brand_id = $brand->getAttribute('id');
            $asset->type = $request->input('type');
            $asset->size = $request->input('size');
            $asset->material = $request->input('material');
            $asset->purchase_year = $request->input('purchase_year');
            $asset->frame_number = $request->input('frame_number');
            $asset->engine_number = $request->input('engine_number');
            $asset->police_number = $request->input('police_number');
            $asset->bpkb_number = $request->input('bpkb_number');
            $asset->origin = $request->input('origin');
            $asset->unit_price = $request->input('unit_price');
            $asset->status = $request->input('status');
            $asset->notes = $request->input('notes');

            if (! $request->filled('distributor')) {
                $asset->distributor_id = $request->input('distributor');
            } else {
                $distributor = Distributor::firstOrCreate([
                    'name' => $request->input('distributor'),
                ]);

                $asset->distributor_id = $distributor->getAttribute('id');
            }

            if ($request->hasFile('photo')) {
                if ($asset->photo && Storage::disk('public')->exists($asset->photo)) {
                    Storage::disk('public')->delete($asset->photo);
                }

                $asset->photo = Storage::disk('public')->put(
                    'photos',
                    $request->file('photo'),
                );
            }

            $asset->save();

            if ($request->hasFile('attachments')) {
                foreach ($asset->assetAttachments as $attachment) {
                    if ($attachment->filename && Storage::disk('public')->exists($attachment->filename)) {
                        Storage::disk('public')->delete($attachment->filename);
                    }

                    $attachment->delete();
                }

                $attachments = $request->file('attachments');

                foreach ($attachments as $filename) {
                    $attachment = new AssetAttachment;
                    $attachment->filename = Storage::disk('public')->putFileAs(
                        'attachments',
                        $filename,
                        time().'_'.$filename->getClientOriginalName(),
                    );
                    $attachment->asset_id = $asset->getAttribute('id');
                    $attachment->save();
                }
            }
        });

        return redirect()->route('asset-active.index')
            ->with('message', 'The asset has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Asset $asset): RedirectResponse
    {
        DB::transaction(function () use ($asset) {
            foreach ($asset->assetAttachments as $attachment) {
                if ($attachment->filename && Storage::disk('public')->exists($attachment->filename)) {
                    Storage::disk('public')->delete($attachment->filename);
                }

                $attachment->delete();
            }

            if ($asset->photo && Storage::disk('public')->exists($asset->photo)) {
                Storage::disk('public')->delete($asset->photo);
            }

            if ($asset->qr_code && Storage::disk('public')->exists($asset->qr_code)) {
                Storage::disk('public')->delete($asset->qr_code);
            }

            $asset->delete();
        });

        return redirect()->route('asset-active.index')
            ->with('message', 'The asset has been deleted.');
    }
}
