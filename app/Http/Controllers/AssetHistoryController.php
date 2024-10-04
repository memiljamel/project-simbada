<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAssetHistoryRequest;
use App\Http\Requests\UpdateAssetHistoryRequest;
use App\Models\Asset;
use App\Models\AssetHistory;
use App\Models\Location;
use App\Models\ResponsiblePerson;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class AssetHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $page = $request->query('page');
        $search = $request->query('search');

        $histories = AssetHistory::with(['asset', 'responsiblePerson', 'location'])
            ->when($search, function (Builder $query, ?string $search) {
                $query->where('date_from', 'LIKE', "%{$search}%")
                    ->orWhere('qty', 'LIKE', "%{$search}%")
                    ->orWhere('condition_percentage', 'LIKE', "%{$search}%")
                    ->orWhere('completeness_percentage', 'LIKE', "%{$search}%")
                    ->orWhereHas('asset', function (Builder $query) use ($search) {
                        $query->where('name', 'LIKE', "%{$search}%");
                    })
                    ->orWhereHas('responsiblePerson', function (Builder $query) use ($search) {
                        $query->where('name', 'LIKE', "%{$search}%");
                    })
                    ->orWhereHas('location', function (Builder $query) use ($search) {
                        $query->where('name', 'LIKE', "%{$search}%");
                    });
            })
            ->latest()
            ->paginate()
            ->withQueryString();

        if ($page > $histories->lastPage() && $page > 1) {
            abort(404);
        }

        return view('asset-histories.index', compact('histories', 'search'));
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

        $persons = ResponsiblePerson::orderBy('name')
            ->pluck('name')
            ->toArray();

        $locations = Location::orderBy('name')
            ->pluck('name')
            ->toArray();

        return view('asset-histories.create', compact('assets', 'persons', 'locations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAssetHistoryRequest $request): RedirectResponse
    {
        DB::transaction(function () use ($request) {
            $person = ResponsiblePerson::firstOrCreate([
                'name' => $request->input('responsible_person'),
            ]);

            $location = Location::firstOrCreate([
                'name' => $request->input('location'),
            ]);

            $history = new AssetHistory;
            $history->asset_id = $request->input('asset_id');
            $history->date_from = $request->input('date_from');
            $history->responsible_person_id = $person->getAttribute('id');
            $history->location_id = $location->getAttribute('id');
            $history->qty = $request->input('qty');
            $history->condition_percentage = $request->input('condition_percentage');
            $history->completeness_percentage = $request->input('completeness_percentage');
            $history->notes = $request->input('notes');
            $history->save();
        });

        return redirect()->route('asset-histories.index')
            ->with('message', 'The history has been created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(AssetHistory $history): View
    {
        return view('asset-histories.show', compact('history'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AssetHistory $history): View
    {
        $assets = Asset::select(['id', 'name'])
            ->where('name', '!=', 'None')
            ->orderBy('name')
            ->get();

        $persons = ResponsiblePerson::orderBy('name')
            ->pluck('name')
            ->toArray();

        $locations = Location::orderBy('name')
            ->pluck('name')
            ->toArray();

        return view('asset-histories.edit', compact('history', 'assets', 'persons', 'locations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAssetHistoryRequest $request, AssetHistory $history): RedirectResponse
    {
        DB::transaction(function () use ($request, $history) {
            $person = ResponsiblePerson::firstOrCreate([
                'name' => $request->input('responsible_person'),
            ]);

            $location = Location::firstOrCreate([
                'name' => $request->input('location'),
            ]);

            $history->asset_id = $request->input('asset_id');
            $history->date_from = $request->input('date_from');
            $history->responsible_person_id = $person->getAttribute('id');
            $history->location_id = $location->getAttribute('id');
            $history->qty = $request->input('qty');
            $history->condition_percentage = $request->input('condition_percentage');
            $history->completeness_percentage = $request->input('completeness_percentage');
            $history->notes = $request->input('notes');
            $history->save();
        });

        return redirect()->route('asset-histories.index')
            ->with('message', 'The history has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AssetHistory $history): RedirectResponse
    {
        $history->delete();

        return redirect()->route('asset-histories.index')
            ->with('message', 'The history has been deleted.');
    }
}
