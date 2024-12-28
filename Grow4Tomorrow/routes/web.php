<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ForumController;


Route::get('/', function () {
    return view('welcome');
});

#Login dan register
Route::get('auth', [AuthController::class, 'showAuthForm'])->name('auth')->middleware('guest');

Route::get('login', [AuthController::class, 'showAuthForm'])->name('auth');
Route::post('login', [AuthController::class, 'login'])->name('login');

Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('register', [AuthController::class, 'register'])->name('register');

Route::post('/logout', function () {
    Auth::logout(); // Logout user
    return redirect('/auth')->with('success', 'You have been logged out.');
})->name('logout');

#Route Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

#Route Forum
Route::resource('forums', ForumController::class);
Route::post('forums/{forum}/comments', [ForumController::class, 'storeComment'])->name('forums.comments.store');