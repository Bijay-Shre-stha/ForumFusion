<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\AvailableCommunityController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\OrganizationController;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $question = Question::all();
    return view('forum.index', ['questions' => $question]);
})->name('home');

Route::get('/welcome', function () {
    return view('welcome');
});


//google
Route::get('login/google', [GoogleController::class, 'google'])
    ->name('google.login');
Route::get('login/google/redirect', [GoogleController::class, 'googleRedirect'])
    ->name('google.redirect');

//facebook
// Route::get('login/facebook', [FacebookController::class, 'facebook'])->name('facebook.login');
// Route::get('login/facebook/redirect', [FacebookController::class, 'facebookRedirect'])->name('facebook.redirect');

//signup
Route::get('/login', function () {
    return view('auth.credentials.login');
})->name('login');
Route::get('/askLogin', function () {
    return view('auth.credentials.askLogin');
})->name('askLogin');


//dashboard
Route::middleware(['isAuthenticated'])->group(function () {
    Route::resource('dashboard', DashboardController::class);
});

//Org
Route::middleware('isAuthenticated')->group(function () {
    Route::resource('community', CommunityController::class);
});

//forum
Route::resource('forum', ForumController::class);

//question
Route::resource('question', QuestionController::class);
Route::resource('answer', AnswerController::class);

//AvailableCommunity
Route::resource('availableCommunity', AvailableCommunityController::class);


// Route::middleware(['auth', 'isAuthenticated'])->group(function () {
//     Route::resource('question', QuestionController::class);
// });

//logout
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/welcome');
})->name('logout');
