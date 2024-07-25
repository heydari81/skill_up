<?php

namespace Heydari81\User\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Heydari81\User\Http\Requests\RegisterRequest;
use App\Providers\RouteServiceProvider;
use Heydari81\User\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('User::Front.auth.signup');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(RegisterRequest $request): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile'=> $request->mobile,
            'username'=> $request->username,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        return auth()->user()->hasVerifiedEmail() ? redirect()->intended(RouteServiceProvider::HOME) : view('User::Front.auth.verify-email');
    }
}
