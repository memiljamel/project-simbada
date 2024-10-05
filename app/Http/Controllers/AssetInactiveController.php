<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class AssetInactiveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $page = $request->query('page');
        $search = $request->query('search');

        $assets = Asset::active(false)->with(['category', 'assetArchive'])
            ->when($search, function (Builder $query, ?string $search) {
                $query->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('code', 'LIKE', "%{$search}%")
                    ->orWhereHas('category', function (Builder $query) use ($search) {
                        $query->where('name', 'LIKE', "%{$search}%");
                    })
                    ->orWhereHas('assetArchive', function (Builder $query) use ($search) {
                        $query->where('inactive_date', 'LIKE', "%{$search}%")
                            ->orWhere('reason', 'LIKE', "%{$search}%");
                    });
            })
            ->latest()
            ->paginate()
            ->withQueryString();

        if ($page > $assets->lastPage() && $page > 1) {
            abort(404);
        }

        return view('asset-inactive.index', compact('assets', 'search'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Asset $asset): View
    {
        return view('asset-inactive.show', compact('asset'));
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

        return redirect()->route('asset-inactive.index')
            ->with('message', 'The asset has been deleted.');
    }
}
