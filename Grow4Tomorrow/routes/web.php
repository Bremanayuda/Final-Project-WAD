<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ForumController;


Route::resource('forums', ForumController::class);
Route::post('forums/{forum}/comments', [ForumController::class, 'storeComment'])->name('forums.comments.store');
