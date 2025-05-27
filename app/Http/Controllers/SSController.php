<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class SSController extends Controller
{
    public function show()
    {
        $user = Auth::user();

        $currentCall = $user->calls()->latest()->first();

        $inVC = $currentCall !== null;

        $participants = $inVC ? $currentCall->users : collect();

        return view('study space', [
            'user' => $user,
            'inVC' => $inVC,
            'participants' => $participants,
            'call' => $currentCall,
        ]);
    }
    public function invite(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user) {
            return response()->json(['success' => true, 'message' => 'User invited successfully. Waiting for response...']);
        } else {
            return response()->json(['success' => false, 'message' => 'User not found.']);
        }
    }


}
