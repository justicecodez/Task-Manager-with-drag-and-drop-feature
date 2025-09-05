<?php

namespace App\Http\Controllers\pub;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Support\Facades\Auth;

class pubController extends Controller
{
    function home() {
        return view('pub.auth.login');
    }

    public function login(Request $request)
    {
        // Validate the form data
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Attempt to log the user in
        if (auth()->attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();

            return redirect()->route('auth.dashboard');
        }

        // If login attempt fails, redirect back with an error
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
}
