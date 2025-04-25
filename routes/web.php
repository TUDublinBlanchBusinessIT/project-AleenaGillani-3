<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// ✅ TEMPORARY WORKAROUND — trash outside auth middleware
Route::get('/test-trash', [MovieController::class, 'trash']);
Route::get('/movies/trash', [MovieController::class, 'trash'])->name('movies.trash');

// ✅ TEMPORARY WORKAROUND — genre trash route outside auth
Route::get('/test-genre-trash', [GenreController::class, 'trash'])->name('genres.trash');

// ✅ Authenticated Routes
Route::middleware('auth')->group(function () {
    Route::resource('movies', MovieController::class);
    Route::resource('genres', GenreController::class);
    Route::resource('reviews', \App\Http\Controllers\ReviewController::class);
    Route::resource('actors', \App\Http\Controllers\ActorController::class);




    Route::post('/movies/restore/{id}', [MovieController::class, 'restore'])->name('movies.restore');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/profile', function(Request $request) {
        $data = $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $request->user()->id,
        ]);
        $request->user()->update($data);
        return back()->with('success', 'Profile updated successfully.');
    })->name('profile.update.post');
});

// Auth scaffolding (login/register)
require __DIR__ . '/auth.php';
