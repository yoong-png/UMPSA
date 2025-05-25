<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Show login form
    public function show()
    {
        return view('login');
    }

    public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        return response()->json([
            'message' => 'Login successful',
            'redirect_url' => route('dashboard')
        ]);
    }

    return response()->json([
        'message' => 'Invalid credentials.'
    ], 401);
}

}
