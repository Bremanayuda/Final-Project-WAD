<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArticleController;
<<<<<<< Updated upstream
use App\Http\Controllers\ProductController;


Route::get('auth', [AuthController::class, 'showAuthForm'])->name('auth');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('register', [AuthController::class, 'register'])->name('register');

Route::resource('products', ProductController::class);

Route::get('/', function () {
    return view('welcome');
=======
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Models\shop;
use Illuminate\Support\Facades\File;


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





#Route Shop
Route::prefix('shop')->name('shop.')->group(function () {
    Route::get('/', [ShopController::class, 'index'])->name('index');
    Route::get('/create', [ShopController::class, 'getCreateForm'])->name('getCreateForm'); 
    Route::post('/store', [ShopController::class, 'store'])->name('store');
    Route::get('/{id}', [ShopController::class, 'show'])->name('show'); 
    Route::get('/{id}/edit', [ShopController::class, 'getEditForm'])->name('getEditForm'); 
    Route::put('/{id}', [ShopController::class, 'update'])->name('update'); 
    Route::delete('/{id}', [ShopController::class, 'destroy'])->name('destroy'); 

>>>>>>> Stashed changes
});