<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginDashboardController extends Controller
{
    public function index()
    {
        return view('login-dashboard');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('crud-dashboard.showForm');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }
}

