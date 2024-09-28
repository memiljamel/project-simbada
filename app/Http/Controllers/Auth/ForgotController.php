<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ForgotRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;

class ForgotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('auth.forgot');
    }

    /**
     * Handle send password reset link.
     */
    public function send(ForgotRequest $request): RedirectResponse
    {
        $credentials = $request->only(['email']);

        $message = Password::sendResetLink($credentials);

        return $message === Password::RESET_LINK_SENT
            ? back()->with(['message' => __($message)])
            : back()->withErrors(['email' => __($message)])->onlyInput('email');
    }
}
