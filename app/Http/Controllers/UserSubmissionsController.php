<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChallengeSubmission;
use Illuminate\Support\Facades\Auth;

class UserSubmissionsController extends Controller
{
    public function showUserAnswers()
    {
        $submissions = \App\Models\ChallengeSubmission::where('user_id', \Illuminate\Support\Facades\Auth::id())
            ->latest()
            ->get();

        return view('previousans', compact('submissions'));
    }

}
