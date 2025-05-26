<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller{

public function show()
{
    $user = Auth::user();

    $groupPoints = null;

    if ($user && $user->group_id) {
        $groupPoints = DB::table('users')
            ->where('group_id', $user->group_id)
            ->sum('points');
    }

    return view('dashboard', [
        'user' => $user,
        'groupPoints' => $groupPoints
    ]);
}
}