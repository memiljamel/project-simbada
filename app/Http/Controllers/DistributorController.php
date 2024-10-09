<?php

namespace App\Http\Controllers;

use App\Enums\PermissionEnum;
use App\Enums\RoleEnum;
use App\Http\Requests\StoreDistributorRequest;
use App\Http\Requests\UpdateDistributorRequest;
use App\Models\Distributor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DistributorController extends Controller
{
    /**
     * Instantiate a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('role:'.RoleEnum::Administrator->value.'|'.RoleEnum::Custom->value);
        $this->middleware('permission:'.PermissionEnum::CrudDistributors->value);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $page = $request->query('page');
        $search = $request->query('search');

        $distributors = Distributor::when($search, function (Builder $query, ?string $search) {
            $query->where('name', 'LIKE', "%{$search}%")
                ->orWhere('address', 'LIKE', "%{$search}%")
                ->orWhere('telephone', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%")
                ->orWhere('officer', 'LIKE', "%{$search}%")
                ->orWhere('description', 'LIKE', "%{$search}%");
        })
            ->latest()
            ->paginate()
            ->withQueryString();

        if ($page > $distributors->lastPage() && $page > 1) {
            abort(404);
        }

        return view('distributors.index', compact('distributors', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('distributors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDistributorRequest $request): RedirectResponse
    {
        $distributor = new Distributor;
        $distributor->name = $request->input('name');
        $distributor->address = $request->input('address');
        $distributor->telephone = $request->input('telephone');
        $distributor->email = $request->input('email');
        $distributor->officer = $request->input('officer');
        $distributor->description = $request->input('description');
        $distributor->save();

        return redirect()->route('distributors.index')
            ->with('message', 'The distributor has been created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Distributor $distributor): View
    {
        return view('distributors.show', compact('distributor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Distributor $distributor): View
    {
        return view('distributors.edit', compact('distributor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDistributorRequest $request, Distributor $distributor)
    {
        $distributor->name = $request->input('name');
        $distributor->address = $request->input('address');
        $distributor->telephone = $request->input('telephone');
        $distributor->email = $request->input('email');
        $distributor->officer = $request->input('officer');
        $distributor->description = $request->input('description');
        $distributor->save();

        return redirect()->route('distributors.index')
            ->with('message', 'The distributor has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Distributor $distributor): RedirectResponse
    {
        $distributor->delete();

        return redirect()->route('distributors.index')
            ->with('message', 'The distributor has been deleted.');
    }
}
