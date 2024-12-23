<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProductController;


Route::get('auth', [AuthController::class, 'showAuthForm'])->name('auth');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('register', [AuthController::class, 'register'])->name('register');

Route::resource('products', ProductController::class);

Route::get('/', function () {
    return view('welcome');
});