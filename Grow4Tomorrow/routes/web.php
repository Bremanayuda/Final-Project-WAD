<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommunityController;


Route::resource('community', CommunityController::class);