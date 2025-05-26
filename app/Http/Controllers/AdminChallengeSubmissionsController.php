<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChallengeSubmission;

class AdminChallengeSubmissionsController extends Controller
{
    // Show all challenge submissions
    public function index()
    {
        // Load submissions with related user, latest first
        $submissions = ChallengeSubmission::with('user')->latest()->get();

        // Return the 'admin' view (your blade) with submissions
        return view('admin', compact('submissions'));
    }

    // Approve or reject a submission
    public function approve(Request $request, $id)
    {
        $submission = ChallengeSubmission::findOrFail($id);

        // Get approve value (1 for correct, 0 for incorrect)
        $approve = $request->input('approve');

        $submission->is_correct = $approve;
        $submission->save();

        if ($approve) {
            // Add points if marked correct
            $submission->user->increment('points', 50);
        }

        return redirect('/admin')->with('success', 'Submission updated successfully.');
    }
}
