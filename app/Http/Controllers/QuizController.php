<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class QuizController extends Controller
{
    public function show()
    {
        return view('quiz');
    }
    public function submitAnswer(Request $request)
{
    Log::info('Quiz form input:', $request->all());

    /** @var \App\Models\User $user */
    $user = Auth::user();
    if (!$user) {
        return redirect()->route('login')->with('message', 'Please log in to submit answers.');
    }

    $request->validate([
        'question_id' => 'required|integer',
        'answer' => 'required|string',
    ]);

    $correctAnswers = [
        1 => 'y = mx + c',
    ];

    $questionId = $request->input('question_id');
    $givenAnswer = strtolower(trim($request->input('answer')));

    if (!isset($correctAnswers[$questionId])) {
        return redirect()->back()->with('message', 'Invalid question selected.');
    }

    $correctAnswer = strtolower($correctAnswers[$questionId]);
    Log::info("Given answer: '{$givenAnswer}' | Correct answer: '{$correctAnswer}'");

    if ($givenAnswer === $correctAnswer) {
        $user->points += 1;
        $user->save();

        if ($request->ajax()) {
            return response()->json([
                'message' => 'Correct! You have earned 5 points!',
                'current_points' => $user->points
            ]);
        } else {
            return redirect()->back()->with('message', 'Correct! You earned 5 points!');
        }
    } else {
        if ($request->ajax()) {
            return response()->json(['message' => 'Incorrect answer.']);
        } else {
            return redirect()->back()->with('message', 'Incorrect answer.');
        }
    }
}

}


