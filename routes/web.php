<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Public landing page
Route::get('/', function () {
    return view('home');
});

//  Dashboard route (required for Breeze navigation)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Protected routes require authentication
Route::middleware('auth')->group(function () {
    // Movie and Genre CRUD
    Route::resource('movies', MovieController::class);
    Route::resource('genres', GenreController::class);

    // User Profile management (provided by Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Handle profile update via POST
    Route::post('/profile', function(Request $request) {
        $data = $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $request->user()->id,
        ]);
        $request->user()->update($data);
        return back()->with('success', 'Profile updated successfully.');
    })->name('profile.update.post');
});

// Authentication routes (login, register, etc.)
require __DIR__ . '/auth.php';
