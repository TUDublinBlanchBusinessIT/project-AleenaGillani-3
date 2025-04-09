<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\MovieController;

Route::get('/', function () {
    return 'Hello, Laravel is working!';
});

// Resource routes for Genres and Movies
Route::resource('genres', GenreController::class);
Route::resource('movies', MovieController::class);
