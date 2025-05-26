<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChallengeSubmission;
use Illuminate\Support\Facades\Auth;

class ChallengeSubmissionController extends Controller
{
    public function submit(Request $request)
    {
        $request->validate([
            'answer' => 'required|string|max:1000',
            'challenge_id' => 'required|integer' // optional validation if you track challenges
        ]);

        $user = Auth::user();

        // Save submission with is_correct = null (pending review)
        ChallengeSubmission::create([
            'user_id' => $user->id,
            'answer' => $request->answer,
            'is_correct' => null,
        ]);

        return response()->json([
            'message' => 'Your answer has been submitted for review. Thank you!'
        ]);
    }
}
