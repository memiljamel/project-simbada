<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\View\View;

class InactiveAssetController extends Controller
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

        return view('inactive-assets.index', compact('assets', 'search'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Asset $asset): View
    {
        return view('inactive-assets.show', compact('asset'));
    }
}
