<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BenefitController;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/dashboard', function () {
    return view('layouts.app');
});



Route::get('auth', [AuthController::class, 'showAuthForm'])->name('auth')->middleware('guest');

Route::get('login', [AuthController::class, 'showAuthForm'])->name('auth');
Route::post('login', [AuthController::class, 'login'])->name('login');

Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('register', [AuthController::class, 'register'])->name('register');

Route::post('/logout', function () {
    Auth::logout(); // Logout user
    return redirect('/auth')->with('success', 'You have been logged out.');
})->name('logout');


Route::resource('benefit', BenefitController::class);
