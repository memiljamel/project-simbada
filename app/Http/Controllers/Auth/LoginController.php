<?php

namespace App\Http\Controllers\Auth;

use App\Enums\RoleEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an authentication attempt.
     */
    public function authenticate(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->only(['email', 'password']);
        $remember = $request->boolean('remember');

        if (Auth::attemptWhen(
            $credentials,
            function (User $user) {
                return $user->hasRole(
                    [RoleEnum::Administrator->value, RoleEnum::Custom->value]
                );
            },
            $remember,
        )) {
            $request->session()->regenerate();

            return redirect()->intended(RouteServiceProvider::HOME);
        }

        return back()->withErrors([
            'email' => __('auth.failed'),
        ])->onlyInput('email');
    }
}
