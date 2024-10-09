<?php

namespace App\Http\Controllers;

use App\Enums\PermissionEnum;
use App\Enums\RoleEnum;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Models\Brand;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BrandController extends Controller
{
    /**
     * Instantiate a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('role:'.RoleEnum::Administrator->value.'|'.RoleEnum::Custom->value);
        $this->middleware('permission:'.PermissionEnum::CrudBrands->value);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $page = $request->query('page');
        $search = $request->query('search');

        $brands = Brand::when($search, function (Builder $query, ?string $search) {
            $query->where('name', 'LIKE', "%{$search}%")
                ->orWhere('description', 'LIKE', "%{$search}%");
        })
            ->latest()
            ->paginate()
            ->withQueryString();

        if ($page > $brands->lastPage() && $page > 1) {
            abort(404);
        }

        return view('brands.index', compact('brands', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('brands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBrandRequest $request): RedirectResponse
    {
        $brand = new Brand;
        $brand->name = $request->input('name');
        $brand->description = $request->input('description');
        $brand->save();

        return redirect()->route('brands.index')
            ->with('message', 'The brand has been created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand): View
    {
        return view('brands.show', compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand): View
    {
        return view('brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBrandRequest $request, Brand $brand): RedirectResponse
    {
        $brand->name = $request->input('name');
        $brand->description = $request->input('description');
        $brand->save();

        return redirect()->route('brands.index')
            ->with('message', 'The brand has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand): RedirectResponse
    {
        $brand->delete();

        return redirect()->route('brands.index')
            ->with('message', 'The brand has been deleted.');
    }
}
