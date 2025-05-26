<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class StudySpaceController extends Controller
{
    public function show()
    {
        $user = Auth::user();

        // Get the most recent call the user is part of
        $currentCall = $user->calls()->latest()->first();

        $inVC = $currentCall !== null;

        $participants = $inVC ? $currentCall->users : collect();

        return view('study.space', [
            'user' => $user,
            'inVC' => $inVC,
            'participants' => $participants,
            'call' => $currentCall,
        ]);
    }
}
