<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChallengeSubmission;

class AdminController extends Controller
{
    // Show admin dashboard with submissions
    public function showAdminPage()
    {
        $submissions = ChallengeSubmission::with('user')->latest()->get();
        return view('admin', compact('submissions'));
    }

    // Approve or reject a submission
    public function approveSubmission(Request $request, $id)
    {
        $submission = ChallengeSubmission::findOrFail($id);

        $approve = $request->input('approve');
        $submission->is_correct = $approve;
        $submission->save();

        if ($approve) {
            $submission->user->increment('points', 50);  // add points for correct answer
        }

        return redirect()->route('admin.dashboard')->with('success', 'Submission updated successfully.');
    }
}
