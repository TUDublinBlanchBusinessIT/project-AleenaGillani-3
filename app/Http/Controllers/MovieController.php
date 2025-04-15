<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Genre;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Start a query for movies
        $query = Movie::query();

        // Filter by search term if provided
        if ($request->has('search') && !empty($request->search)) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        // Filter by genre if provided
        if ($request->has('genre_id') && !empty($request->genre_id)) {
            $query->where('genre_id', $request->genre_id);
        }

        // Retrieve filtered movies
        $movies = $query->get();

        // Also retrieve all genres to populate filter dropdown
        $genres = Genre::all();

        return view('movies.index', compact('movies', 'genres'));
    }

    // ... (other methods remain unchanged)
}
