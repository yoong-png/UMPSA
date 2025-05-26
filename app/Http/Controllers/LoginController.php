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

    /** @var \App\Models\User $user */
    $user = Auth::user(); 

   if (Auth::attempt($credentials)) {
    $request->session()->regenerate();

    $user = Auth::user();

    // Check role *after* successful login
    if (isset($user->role) && $user->role === 'teacher') {
        $redirectUrl = route('admin.dashboard'); // redirect teachers to admin
    } else {
        $redirectUrl = route('dashboard'); // others to dashboard
    }

    return response()->json([
    'message' => 'Login successful. Role: ' . $user->role,
    'redirect_url' => $redirectUrl,
    ]);


    }

    return response()->json([
        'message' => 'Invalid credentials.'
    ], 401);
}

}
