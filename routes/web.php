<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ActorController;
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

Route::get('/test-genre-trash', [GenreController::class, 'trash'])->name('genres.trash');

// ✅ TEMPORARY WORKAROUND — actor trash route outside auth
Route::get('/test-actor-trash', [ActorController::class, 'trash'])->name('actors.trash');

// ✅ Authenticated Routes
Route::middleware('auth')->group(function () {
    Route::resource('movies', MovieController::class);
    Route::resource('genres', GenreController::class);
    Route::resource('reviews', ReviewController::class);
    Route::resource('actors', ActorController::class);

    // ✅ Restore Routes
    Route::post('/movies/restore/{id}', [MovieController::class, 'restore'])->name('movies.restore');
    Route::post('/actors/restore/{id}', [ActorController::class, 'restore'])->name('actors.restore');
    Route::post('/genres/restore/{id}', [GenreController::class, 'restore'])->name('genres.restore');

    
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
