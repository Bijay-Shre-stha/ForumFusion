<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\OrganizationController;
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
    return view('dashboard.index');
})->name('home');

Route::get('/welcome', function () {
    return view('welcome');
});


//google
Route::get('login/google', [GoogleController::class, 'google'])->name('google.login');
Route::get('login/google/redirect', [GoogleController::class, 'googleRedirect'])->name('google.redirect');

//facebook
// Route::get('login/facebook', [FacebookController::class, 'facebook'])->name('facebook.login');
// Route::get('login/facebook/redirect', [FacebookController::class, 'facebookRedirect'])->name('facebook.redirect');

//signup
Route::get('/signup', function () { return view('auth.credentials.signup');})->name('register');
Route::get('/login',function(){return view('auth.credentials.login');})->name('login');


//dashboard
Route::get('/dashboard', function () { return view('dashboard.index');})->name('dashboard');

//Org
Route::
    resource('organization',OrganizationController::class)
    ->except(['show'])
    ->middleware('auth');

