<?php

namespace Heydari81\User\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Heydari81\User\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Heydari81\User\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('User::Front.auth.signup');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        if (User::query()->where('email',$request->email)->first()->status == "ban"){
            return redirect()->route('home');
        }
        $request->authenticate();
        $request->session()->regenerate();
        return redirect()->route('home');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
