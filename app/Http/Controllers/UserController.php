<?php

namespace App\Http\Controllers;

use App\Enums\RoleEnum;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Instantiate a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('role:'.RoleEnum::Administrator->value);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $page = $request->query('page');
        $search = $request->query('search');

        $users = User::withoutAdministratorRole()->when($search, function (Builder $query, ?string $search) {
            $query->where('name', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%")
                ->orWhere('description', 'LIKE', "%{$search}%");
        })
            ->latest()
            ->paginate()
            ->withQueryString();

        if ($page > $users->lastPage() && $page > 1) {
            abort(404);
        }

        return view('users.index', compact('users', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request): RedirectResponse
    {
        DB::transaction(function () use ($request) {
            $user = new User;
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            $user->description = $request->input('description');

            if ($request->hasFile('photo')) {
                if ($user->photo && Storage::disk('public')->exists($user->photo)) {
                    Storage::disk('public')->delete($user->photo);
                }

                $user->photo = Storage::disk('public')->put(
                    'photos',
                    $request->file('photo'),
                );
            }

            $user->save();

            $permissions = Permission::whereIn('name', $request->input('permissions'))
                ->get()
                ->toArray();

            $user->givePermissions($permissions);
            $user->addRole(RoleEnum::Custom->value);
        });

        return redirect()->route('users.index')
            ->with('message', 'The user has been created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user): View
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): View
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user): RedirectResponse
    {
        DB::transaction(function () use ($request, $user) {
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->description = $request->input('description');

            if ($request->filled('password')) {
                $user->password = Hash::make($request->input('password'));
            }

            if ($request->hasFile('photo')) {
                if ($user->photo && Storage::disk('public')->exists($user->photo)) {
                    Storage::disk('public')->delete($user->photo);
                }

                $user->photo = Storage::disk('public')->put(
                    'photos',
                    $request->file('photo'),
                );
            }

            $user->save();

            $permissions = Permission::whereIn('name', $request->input('permissions'))
                ->get()
                ->toArray();

            $user->syncPermissions($permissions);
        });

        return redirect()->route('users.index')
            ->with('message', 'The user has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): RedirectResponse
    {
        DB::transaction(function () use ($user) {
            $roles = Role::whereIn('name', $user->roles->pluck('name'))
                ->get()
                ->toArray();

            $permissions = Permission::whereIn('name', $user->permissions->pluck('name'))
                ->get()
                ->toArray();

            $user->removeRoles($roles);
            $user->removePermissions($permissions);

            if ($user->photo && Storage::disk('public')->exists($user->photo)) {
                Storage::disk('public')->delete($user->photo);
            }

            $user->delete();
        });

        return redirect()->route('users.index')
            ->with('message', 'The user has been deleted.');
    }
}
