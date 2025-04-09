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
    public function index()
    {
       
        return 'Testing Movies Index';

        // Retrieve all movies
        $movies = Movie::all();
        return view('movies.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Retrieve all genres to populate the genre drop-down
        $genres = Genre::all();
        return view('movies.create', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate and store the new movie
        $validated = $request->validate([
            'title'        => 'required|string|max:255',
            'genre_id'     => 'required|exists:genres,id',
            'release_date' => 'required|date',
            'rating'       => 'nullable|string',
            'description'  => 'nullable|string',
        ]);

        Movie::create($validated);

        return redirect()->route('movies.index')->with('success', 'Movie created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Find movie by id and display details
        $movie = Movie::findOrFail($id);
        return view('movies.show', compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Find movie to edit and get all genres for the dropdown
        $movie = Movie::findOrFail($id);
        $genres = Genre::all();
        return view('movies.edit', compact('movie', 'genres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate and update the movie
        $validated = $request->validate([
            'title'        => 'required|string|max:255',
            'genre_id'     => 'required|exists:genres,id',
            'release_date' => 'required|date',
            'rating'       => 'nullable|string',
            'description'  => 'nullable|string',
        ]);

        $movie = Movie::findOrFail($id);
        $movie->update($validated);

        return redirect()->route('movies.index')->with('success', 'Movie updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find and delete the movie
        $movie = Movie::findOrFail($id);
        $movie->delete();

        return redirect()->route('movies.index')->with('success', 'Movie deleted successfully.');
    }
}
