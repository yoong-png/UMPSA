<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LeaderboardController extends Controller
{

    public function show()
    {
        $users = User::orderBy('points', 'desc')->take(3)->get(); 
        return view('leaderboard', compact('users'));
    }
}
