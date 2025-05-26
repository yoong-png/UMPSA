<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class GroupController extends Controller
{
    public function create(Request $request)
    {
    $user = Auth::user();

    if ($user->group_id !== null) {
        return back()->with('error', 'You are already in a group.');
    }

    // Validate emails
    $request->validate([
        'friend1_email' => 'required|email',
        'friend2_email' => 'required|email|different:friend1_email',
    ]);

    $friend1 = User::where('email', $request->friend1_email)->first();
    $friend2 = User::where('email', $request->friend2_email)->first();

    if (!$friend1 || !$friend2) {
        return back()->with('error', 'One or Both users are not found.');
    }
 
    if ($friend1->group_id || $friend2->group_id) {
        return back()->with('error', 'One or Both users are already in a group.');
    }

    $maxGroupId = User::whereNotNull('group_id')->max('group_id');
    $newGroupId = str_pad(((int) $maxGroupId) + 1, 3, '0', STR_PAD_LEFT);

    $user->group_id = $newGroupId;
    $user->save();

    $friend1->group_id = $newGroupId;
    $friend1->save();

    $friend2->group_id = $newGroupId;
    $friend2->save();

    return redirect()->route('leaderboard')->with('success', 'Group created successfully.');
    }

}
