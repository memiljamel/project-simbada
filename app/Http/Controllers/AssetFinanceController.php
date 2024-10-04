<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAssetFinanceRequest;
use App\Http\Requests\UpdateAssetFinanceRequest;
use App\Models\Asset;
use App\Models\AssetFinance;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AssetFinanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $page = $request->query('page');
        $search = $request->query('search');

        $finances = AssetFinance::with(['asset'])
            ->when($search, function (Builder $query, ?string $search) {
                $query->where('type', 'LIKE', "%{$search}%")
                    ->orWhere('date', 'LIKE', "%{$search}%")
                    ->orWhere('amount', 'LIKE', "%{$search}%")
                    ->orWhereHas('asset', function (Builder $query) use ($search) {
                        $query->where('name', 'LIKE', "%{$search}%");
                    });
            })
            ->latest()
            ->paginate()
            ->withQueryString();

        if ($page > $finances->lastPage() && $page > 1) {
            abort(404);
        }

        return view('asset-finances.index', compact('finances', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $assets = Asset::select(['id', 'name'])
            ->where('name', '!=', 'None')
            ->orderBy('name')
            ->get();

        return view('asset-finances.create', compact('assets'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAssetFinanceRequest $request): RedirectResponse
    {
        $finance = new AssetFinance;
        $finance->asset_id = $request->input('asset_id');
        $finance->type = $request->input('type');
        $finance->date = $request->input('date');
        $finance->amount = $request->input('amount');
        $finance->notes = $request->input('notes');
        $finance->save();

        return redirect()->route('asset-finances.index')
            ->with('message', 'The finance has been created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(AssetFinance $finance): View
    {
        return view('asset-finances.show', compact('finance'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AssetFinance $finance): View
    {
        $assets = Asset::select(['id', 'name'])
            ->where('name', '!=', 'None')
            ->orderBy('name')
            ->get();

        return view('asset-finances.edit', compact('finance', 'assets'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAssetFinanceRequest $request, AssetFinance $finance): RedirectResponse
    {
        $finance->asset_id = $request->input('asset_id');
        $finance->type = $request->input('type');
        $finance->date = $request->input('date');
        $finance->amount = $request->input('amount');
        $finance->notes = $request->input('notes');
        $finance->save();

        return redirect()->route('asset-finances.index')
            ->with('message', 'The finance has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AssetFinance $finance): RedirectResponse
    {
        $finance->delete();

        return redirect()->route('asset-finances.index')
            ->with('message', 'The finance has been deleted.');
    }
}
