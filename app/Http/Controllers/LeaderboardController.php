<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LeaderboardController extends Controller
{
    // Top 3 users for view
    public function show()
    {
        $users = User::orderByDesc('points') // Include all users
                     ->take(3)
                     ->get();

        return view('leaderboard', compact('users'));
    }

    // All users JSON (include everyone)
    public function allUsers()
    {
        $users = User::orderByDesc('points')
                     ->get()
                     ->map(function ($user, $index) {
                         return [
                             'rank' => $index + 1,
                             'name' => $user->name,
                             'email' => $user->email,
                             'points' => $user->points,
                         ];
                     });

        return response()->json($users);
    }

    // Group totals JSON (exclude ungrouped users)
    public function groupTotals()
    {
        $groups = User::whereNotNull('group_id') // Exclude null group_id
                      ->select('group_id')
                      ->selectRaw('SUM(points) as points')
                      ->groupBy('group_id')
                      ->orderByDesc('points')
                      ->get()
                      ->map(function ($group, $index) {
                          return [
                              'group_id' => $group->group_id,
                              'points' => $group->points,
                              'rank' => $index + 1,
                          ];
                      });

        return response()->json($groups);
    }

    public function schoolTotals()
    {
        // Currently, no school data, so return an empty JSON array
        return response()->json([]);
    }

}
