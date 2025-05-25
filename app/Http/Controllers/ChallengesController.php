<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

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

    $correctAnswers = [
        1 => '123',
    ];

    $challengeId = $request->challenge_id;
    $givenAnswer = trim(strtolower($request->answer));

    if (!isset($correctAnswers[$challengeId])) {
        return response()->json(['error' => 'Invalid challenge ID'], 400);
    }

    $correctAnswer = strtolower($correctAnswers[$challengeId]);

    if ($givenAnswer === $correctAnswer) {
        $user->points += 5;
        $user->save();

        return response()->json([
            'message' => 'Correct! You have earned 5 points!',
            'current_points' => $user->points
        ]);
    } else {
        return response()->json(['message' => 'Incorrect answer.'], 200);
    }
}

}
