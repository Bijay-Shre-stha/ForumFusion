<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\ForumController;
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

Route::get('/',[DashboardController::class,'index'])->name('dashboard.index');

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
Route::resource('dashboard', DashboardController::class);

//Org
Route::get('/organization',[OrganizationController::class,'index'])->name('organization.index');
Route::get('/organization/create/',[OrganizationController::class,'create'])->name('organization.create');
Route::post('/organization/store/',[OrganizationController::class,'store'])->name('organization.store');
Route::get('/organization/{id}/edit',[OrganizationController::class,'edit'])->name('organization.edit');
Route::put('/organization/{id}/update',[OrganizationController::class,'update'])->name('organization.update');
Route::get('/organization/{id}/delete',[OrganizationController::class,'delete'])->name('organization.delete');

Route::resource('forum', ForumController::class);
