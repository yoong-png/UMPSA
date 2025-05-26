<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ChallengesSubmission;

class ChallengesController extends Controller
{
    public function show()
    {
        return view('competition');
    }


    public function completeChallenge(Request $request)
{
    /** @var \App\Models\User $user */
    $user = Auth::user();

    if (!$user) {
        return response()->json(['error' => 'User not authenticated'], 401);
    }

    $request->validate([
        'challenge_id' => 'required|integer',
        'answer' => 'required|string',
    ]);


    $challengeId = $request->challenge_id;
    $givenAnswer = trim(strtolower($request->answer));


    return response()->json([
        'message' => 'The Admins are checking your answer! Give them some time...',
    ]);
    }

}