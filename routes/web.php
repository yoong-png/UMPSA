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
use App\Http\Controllers\StudySpaceController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\DiscussController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController;


//Header
Route::get('/dashboard', [DashboardController::class, 'show'])
    ->middleware('auth')
    ->name('dashboard');
Route::get('/studyspace', [StudySpaceController::class, 'show'])->name('study.space');
Route::get('/rewards', [RewardsController::class, 'show'])->name('rewards');
Route::get('/challenges', [ChallengesController::class, 'show'])->name('weekly.challenge');
Route::post('/challenge/complete', [ChallengesController::class, 'completeChallenge'])->name('challenge.complete');
Route::get('/leaderboard', [LeaderboardController::class, 'show'])->name('leaderboard');

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

Route::get('/signup', [SignupController::class, 'show'])->name('signup');

/**Landing Page */
Route::get('/',function(){
    return view('landing page');
});

Route::post('/signup', function (Request $request) {
});

/**Admin */
Route::get('/admin',function(){
    return view('admin');
});

Route::post('/complete-challenge', [ChallengesController::class, 'completeChallenge'])->name('challenge.complete');

Route::get('/posts/{id}',function($id){
    return response ('Post ' . $id);
})->where('id','[0-9]+');


Route::get('/search',function(Request $request){
    return $request->name . ' '. $request-> school;
});


