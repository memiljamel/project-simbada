<?php

namespace App\Http\Controllers;

use App\Enums\PermissionEnum;
use App\Enums\RoleEnum;
use App\Http\Requests\StoreAssetArchiveRequest;
use App\Models\Asset;
use App\Models\AssetArchive;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class AssetArchiveController extends Controller
{
    /**
     * Instantiate a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('role:'.RoleEnum::Administrator->value.'|'.RoleEnum::Custom->value);
        $this->middleware('permission:'.PermissionEnum::ArchiveAssets->value)->only(['create', 'store']);
        $this->middleware('permission:'.PermissionEnum::UnarchivedAssets->value)->only(['destroy']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Asset $asset): View
    {
        return view('asset-archives.create', compact('asset'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAssetArchiveRequest $request, Asset $asset): RedirectResponse
    {
        DB::transaction(function () use ($request, $asset) {
            $asset->active = false;
            $asset->save();

            $archive = new AssetArchive;
            $archive->inactive_date = $request->input('inactive_date');
            $archive->reason = $request->input('reason');
            $archive->notes = $request->input('notes');
            $archive->asset_id = $asset->getAttribute('id');
            $archive->save();
        });

        return redirect()->route('asset-inactive.index')
            ->with('message', 'The asset has been archived.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Asset $asset): RedirectResponse
    {
        DB::transaction(function () use ($asset) {
            $asset->active = true;
            $asset->save();

            $asset->assetArchive()->delete();
        });

        return redirect()->route('asset-active.index')
            ->with('message', 'The asset has been unarchived.');
    }
}
