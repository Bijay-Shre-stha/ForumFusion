<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\FacebookController;

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
    return view('auth.passwords.login');
})->name('home');

Route::get('/welcome', function () {
    return view('welcome');
});


//google
Route::get('login/google', [GoogleController::class, 'google'])->name('google.login');
Route::get('login/google/redirect', [GoogleController::class, 'googleRedirect'])->name('google.redirect');

//facebook
Route::get('login/facebook', [FacebookController::class, 'facebook'])->name('facebook.login');
Route::get('login/facebook/redirect', [FacebookController::class, 'facebookRedirect'])->name('facebook.redirect');

//signup
Route::get('/signup', function () { return view('auth.passwords.signup');})->name('register');
