<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\YourModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


use App\Http\Controllers\QuizController;
use App\Http\Controllers\LeaderboardController;
use App\Http\Controllers\RewardsController;
use App\Http\Controllers\ChallengesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SSController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\DiscussController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\ChallengeSubmissionController;
use App\Http\Controllers\AdminChallengeSubmissionsController;

//Header
Route::get('/dashboard', [DashboardController::class, 'show'])
    ->middleware('auth')
    ->name('dashboard');
Route::get('/studyspace', [SSController::class, 'show'])->name('study.space');
Route::get('/rewards', [RewardsController::class, 'show'])->name('rewards');
Route::get('/challenges', [ChallengesController::class, 'show'])->name('weekly.challenge');
Route::post('/challenge/complete', [ChallengesController::class, 'completeChallenge'])->name('challenge.complete');
Route::get('/leaderboard', [LeaderboardController::class, 'show'])->name('leaderboard');
Route::post('/groups/create', [GroupController::class, 'create'])->name('groups.create');
Route::get('/admin', [AdminChallengeSubmissionsController::class, 'index'])->name('admin.dashboard');

//Footer
Route::get('/quiz', [QuizController::class, 'show'])->name('quiz');
Route::post('/quiz/submit', [QuizController::class, 'submitAnswer'])
    ->middleware('auth')
    ->name('quiz.submit');
//study space
Route::get('/note', [NoteController::class, 'show'])->name('note');
Route::get('/info', [InfoController::class, 'show'])->name('info');
Route::get('/discuss', [DiscussController::class, 'show'])->name('discuss');

Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
})->name('logout');


/**Landing Page */
Route::get('/',function(){
    return view('landing page');
});

Route::get('/signup', [SignupController::class, 'show'])->name('signup');
Route::post('/signup', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:6|confirmed',
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    $emailDomain = substr(strrchr($request->email, "@"), 1);
    $domain = strtolower(trim($emailDomain));
    $isTeacher = str_ends_with($domain, 'school.edu.my');

    $user = \App\Models\User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => \Illuminate\Support\Facades\Hash::make($request->password),
        'role' => $isTeacher ? 'teacher' : 'student',
        'points' => 0,
    ]);

    return response()->json([
        'message' => 'User registered successfully',
        'redirect_url' => route('login'),
        'user' => [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'role' => $user->role,
        ],
    ]);
});

Route::post('/complete-challenge', [ChallengesController::class, 'completeChallenge'])->name('challenge.complete');

Route::get('/posts/{id}',function($id){
    return response ('Post ' . $id);
})->where('id','[0-9]+');


Route::get('/search',function(Request $request){
    return $request->name . ' '. $request-> school;
});

use App\Http\Controllers\CallController;

Route::middleware(['auth'])->group(function () {
    Route::post('/vc-room/join', [CallController::class, 'join'])->name('vc-room.join');
    Route::post('/vc-room/leave', [CallController::class, 'leave'])->name('vc-room.leave');
    Route::post('/vc-room/invite', [CallController::class, 'invite'])->name('vc-room.invite');
});


Route::post('/challenge/submit', [ChallengeSubmissionController::class, 'submit'])->middleware('auth')->name('challenge.complete');

Route::prefix('admin')->group(function () {
    Route::get('submissions', [AdminChallengeSubmissionsController::class, 'index'])->name('admin.submissions.index');
    Route::post('submissions/{id}/approve', [AdminChallengeSubmissionsController::class, 'approve'])->name('admin.submissions.approve');
});

Route::get('/previous-answers', function () {
    return view('previousans');
})->name('previous.answers');




