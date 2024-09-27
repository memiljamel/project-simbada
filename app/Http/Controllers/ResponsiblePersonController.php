<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreResponsiblePersonRequest;
use App\Http\Requests\UpdateResponsiblePersonRequest;
use App\Models\ResponsiblePerson;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ResponsiblePersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $page = $request->query('page');
        $search = $request->query('search');

        $persons = ResponsiblePerson::when($search, function (Builder $query, ?string $search) {
            $query->where('name', 'LIKE', "%{$search}%")
                ->orWhere('position', 'LIKE', "%{$search}%")
                ->orWhere('address', 'LIKE', "%{$search}%")
                ->orWhere('telephone', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%")
                ->orWhere('description', 'LIKE', "%{$search}%");
        })
            ->latest()
            ->paginate()
            ->withQueryString();

        if ($page > $persons->lastPage() && $page > 1) {
            abort(404);
        }

        return view('responsible-persons.index', compact('persons', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('responsible-persons.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreResponsiblePersonRequest $request): RedirectResponse
    {
        $person = new ResponsiblePerson;
        $person->name = $request->input('name');
        $person->position = $request->input('position');
        $person->address = $request->input('address');
        $person->telephone = $request->input('telephone');
        $person->email = $request->input('email');
        $person->description = $request->input('description');
        $person->save();

        return redirect()->route('responsible-persons.index')
            ->with('message', 'The responsible person has been created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ResponsiblePerson $person): View
    {
        return view('responsible-persons.show', compact('person'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ResponsiblePerson $person): View
    {
        return view('responsible-persons.edit', compact('person'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateResponsiblePersonRequest $request, ResponsiblePerson $person): RedirectResponse
    {
        $person->name = $request->input('name');
        $person->position = $request->input('position');
        $person->address = $request->input('address');
        $person->telephone = $request->input('telephone');
        $person->email = $request->input('email');
        $person->description = $request->input('description');
        $person->save();

        return redirect()->route('responsible-persons.index')
            ->with('message', 'The responsible person has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ResponsiblePerson $person): RedirectResponse
    {
        $person->delete();

        return redirect()->route('responsible-persons.index')
            ->with('message', 'The responsible person has been deleted.');
    }
}
