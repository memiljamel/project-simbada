<?php

namespace App\Http\Controllers;

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

class ActiveAssetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $page = $request->query('page');
        $search = $request->query('search');

        $assets = Asset::active(true)->with(['category', 'brand', 'latestHistory'])
            ->when($search, function (Builder $query, ?string $search) {
                $query->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('code', 'LIKE', "%{$search}%")
                    ->orWhere('type', 'LIKE', "%{$search}%")
                    ->orWhere('purchase_date', 'LIKE', "%{$search}%")
                    ->orWhereHas('category', function (Builder $query) use ($search) {
                        $query->where('name', 'LIKE', "%{$search}%");
                    })
                    ->orWhereHas('brand', function (Builder $query) use ($search) {
                        $query->where('name', 'LIKE', "%{$search}%");
                    })
                    ->orWhereHas('latestHistory', function (Builder $query) use ($search) {
                        $query->where('date_from', 'LIKE', "%{$search}%");
                    });
            })
            ->latest()
            ->paginate()
            ->withQueryString();

        if ($page > $assets->lastPage() && $page > 1) {
            abort(404);
        }

        return view('active-assets.index', compact('assets', 'search'));
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

        return view('active-assets.create', compact('categories', 'brands', 'distributors'));
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

            $distributor = Distributor::firstOrCreate([
                'name' => $request->input('distributor'),
            ]);

            $asset = new Asset;
            $asset->name = $request->input('name');
            $asset->code = $request->input('code');
            $asset->category_id = $category->getAttribute('id');
            $asset->brand_id = $brand->getAttribute('id');
            $asset->type = $request->input('type');
            $asset->manufacturer = $request->input('manufacturer');
            $asset->serial_number = $request->input('serial_number');
            $asset->production_year = $request->input('production_year');
            $asset->description = $request->input('description');
            $asset->purchase_date = $request->input('purchase_date');
            $asset->distributor_id = $distributor->getAttribute('id');
            $asset->invoice_number = $request->input('invoice_number');
            $asset->qty = $request->input('qty');
            $asset->unit_price = $request->input('unit_price');
            $asset->notes = $request->input('notes');

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
                    ->generate("http://localhost:8080/{$asset->id}"),
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

        return redirect()->route('active-assets.index')
            ->with('message', 'The asset has been created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Asset $asset): View
    {
        return view('active-assets.show', compact('asset'));
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

        return view('active-assets.edit', compact('asset', 'categories', 'brands', 'distributors'));
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

            $distributor = Distributor::firstOrCreate([
                'name' => $request->input('distributor'),
            ]);

            $asset->name = $request->input('name');
            $asset->code = $request->input('code');
            $asset->category_id = $category->getAttribute('id');
            $asset->brand_id = $brand->getAttribute('id');
            $asset->type = $request->input('type');
            $asset->manufacturer = $request->input('manufacturer');
            $asset->serial_number = $request->input('serial_number');
            $asset->production_year = $request->input('production_year');
            $asset->description = $request->input('description');
            $asset->purchase_date = $request->input('purchase_date');
            $asset->distributor_id = $distributor->getAttribute('id');
            $asset->invoice_number = $request->input('invoice_number');
            $asset->qty = $request->input('qty');
            $asset->unit_price = $request->input('unit_price');
            $asset->notes = $request->input('notes');

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

        return redirect()->route('active-assets.index')
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

        return redirect()->route('active-assets.index')
            ->with('message', 'The asset has been deleted.');
    }
}
