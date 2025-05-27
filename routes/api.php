<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CallController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LeaderboardController;


Route::get('/ping', function () {
    return response()->json(['message' => 'pong']);
});



Route::get('/allusers', function () {
   $users = User::all()->map(function ($user) {
    $prefix = $user->role === 'teacher' ? 'TCH' : 'STD';
    return[
        'id' => str_pad($user->id, 3, '0', STR_PAD_LEFT),
        'unique_id'=> $prefix . str_pad($user->id,3,'0',STR_PAD_LEFT),
        'name' => $user->name,
        'email' => $user->email,
        'role'=>$user->role, 
        'points' =>$user->points,
        'group'=>$user->group_id,
    ];
    });
    return response()->json($users);
});

Route::get('/students', function () {
    $students = \App\Models\User::where('role', 'student')->get()->map(function ($user) {
        return [
            'id' => str_pad($user->id, 3, '0', STR_PAD_LEFT),
            'unique_id' => 'STD' . str_pad($user->id, 3, '0', STR_PAD_LEFT),
            'name' => $user->name,
            'email' => $user->email,
            'points' => $user->points,
        ];
    });

    return response()->json($students);
});

Route::get('/teachers', function () {
    $teachers = \App\Models\User::where('role', 'teacher')->get()->map(function ($user) {
        return [
            'id' => str_pad($user->id, 3, '0', STR_PAD_LEFT),
            'unique_id' => 'TCH' . str_pad($user->id, 3, '0', STR_PAD_LEFT),
            'name' => $user->name,
            'email' => $user->email,
            'points' => $user->points,
        ];
    });

    return response()->json($teachers);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/calls', [CallController::class, 'create']);
    Route::post('/calls/{call}/invite', [CallController::class, 'invite']);
    Route::post('/calls/{call}/join', [CallController::class, 'join']);
    Route::post('/calls/{call}/leave', [CallController::class, 'leave']);
    Route::get('/calls/{call}', [CallController::class, 'show']);
});

//manual points adding/subtracting
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/user/{id}/add-points', function ($id, Request $request) {
        $request->validate(['points' => 'required|integer|min:1']);

        $user = User::findOrFail($id);
        $user->points += $request->points;
        $user->save();

        return response()->json(['message' => 'Points added', 'points' => $user->points]);
    });

    Route::post('/user/{id}/subtract-points', function ($id, Request $request) {
        $request->validate(['points' => 'required|integer|min:1']);

        $user = User::findOrFail($id);
        $user->points = max(0, $user->points - $request->points);
        $user->save();

        return response()->json(['message' => 'Points subtracted', 'points' => $user->points]);
    });
});

Route::get('/leaderboard', [LeaderboardController::class, 'allUsers']);
Route::get('/leaderboard/{group}', [LeaderboardController::class, 'groupUsers']);
Route::get('/leaderboard-groups', [LeaderboardController::class, 'groupTotals']);
Route::get('/leaderboard-schools', [LeaderboardController::class, 'schoolTotals']);
