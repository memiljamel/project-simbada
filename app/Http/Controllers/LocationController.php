<?php

namespace App\Http\Controllers;

use App\Enums\PermissionEnum;
use App\Enums\RoleEnum;
use App\Http\Requests\StoreLocationRequest;
use App\Http\Requests\UpdateLocationRequest;
use App\Models\Location;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LocationController extends Controller
{
    /**
     * Instantiate a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('role:'.RoleEnum::Administrator->value.'|'.RoleEnum::Custom->value);
        $this->middleware('permission:'.PermissionEnum::CrudLocations->value);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $page = $request->query('page');
        $search = $request->query('search');

        $locations = Location::when($search, function (Builder $query, ?string $search) {
            $query->where('name', 'LIKE', "%{$search}%")
                ->orWhere('description', 'LIKE', "%{$search}%");
        })
            ->latest()
            ->paginate()
            ->withQueryString();

        if ($page > $locations->lastPage() && $page > 1) {
            abort(404);
        }

        return view('locations.index', compact('locations', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('locations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLocationRequest $request): RedirectResponse
    {
        $location = new Location;
        $location->name = $request->input('name');
        $location->description = $request->input('description');
        $location->save();

        return redirect()->route('locations.index')
            ->with('message', 'The location has been created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Location $location): View
    {
        return view('locations.show', compact('location'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Location $location): View
    {
        return view('locations.edit', compact('location'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLocationRequest $request, Location $location): RedirectResponse
    {
        $location->name = $request->input('name');
        $location->description = $request->input('description');
        $location->save();

        return redirect()->route('locations.index')
            ->with('message', 'The location has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location): RedirectResponse
    {
        $location->delete();

        return redirect()->route('locations.index')
            ->with('message', 'The location has been deleted.');
    }
}
