<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

}
