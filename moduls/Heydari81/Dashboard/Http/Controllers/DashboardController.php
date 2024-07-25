<?php

namespace Heydari81\Dashboard\Http\Controllers;

use App\Http\Controllers\Controller;
use Heydari81\Front\Http\Controllers\FrontController;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->user()->hasRole('teacher') || auth()->user()->hasRole('manager') || auth()->user()->hasRole('super_admin')) {
            return view('Dashboard::dashboard');
        }elseif(!auth()->user()->hasVerifiedEmail()){
            return view('User::Front.auth.verify-email');
        }else{
            return redirect()->route('home');
        }
}
}
