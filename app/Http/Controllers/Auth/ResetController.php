<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResetRequest;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ResetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $token = $request->query('token');

        return view('auth.reset', compact('token'));
    }

    /**
     * Handle user password reset.
     */
    public function recovery(ResetRequest $request): RedirectResponse
    {
        $credentials = $request->only(['token', 'email', 'password']);

        $message = Password::reset($credentials, function (User $user, string $password) {
            $user->forceFill([
                'password' => Hash::make($password),
            ])->setRememberToken(Str::random(60));

            $user->save();

            event(new PasswordReset($user));
        });

        return $message === Password::PASSWORD_RESET
            ? redirect()->route('login.index')->with('message', __($message))
            : back()->withErrors(['email' => __($message)])->onlyInput('email');
    }
}
