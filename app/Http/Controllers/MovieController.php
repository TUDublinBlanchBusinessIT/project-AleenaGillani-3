<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Genre;
use App\Models\Actor;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Movie::query();

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('genre_id')) {
            $query->where('genre_id', $request->genre_id);
        }

        $movies = $query->with('actors')->get();  // Eager load actors
        $genres = Genre::all();

        return view('movies.index', compact('movies', 'genres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres = Genre::all();
        $actors = Actor::all();  // Fetch all actors
        return view('movies.create', compact('genres', 'actors'));  // Pass actors to the view
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'release_date' => 'required|date',
            'genre_id' => 'required|exists:genres,id',
            'actors' => 'required|array',  // Validate the actors selection
        ]);

        // Create the movie
        $movie = Movie::create($validated);

        // Attach the selected actors to the movie using the pivot table
        $movie->actors()->attach($request->actors);

        return redirect()->route('movies.index')
            ->with('success', 'Movie created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $movie = Movie::with('actors')->findOrFail($id);  // Eager load actors
        return view('movies.show', compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $movie  = Movie::findOrFail($id);
        $genres = Genre::all();
        $actors = Actor::all();  // Fetch all actors
        return view('movies.edit', compact('movie', 'genres', 'actors'));  // Pass actors to the view
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'release_date' => 'required|date',
            'genre_id' => 'required|exists:genres,id',
            'actors' => 'required|array',  // Validate the actors selection
        ]);

        // Find the movie and update
        $movie = Movie::findOrFail($id);
        $movie->update($validated);

        // Sync the selected actors with the movie (this removes old ones and adds new ones)
        $movie->actors()->sync($request->actors);

        return redirect()->route('movies.index')->with('success', 'Movie updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $movie = Movie::findOrFail($id);
        $movie->delete();

        return redirect()->route('movies.index')
            ->with('success', 'Movie deleted successfully.');
    }

    /**
     * Validation rules for movies.
     */
    protected function movieRules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'genre_id' => 'required|exists:genres,id',
            'release_date' => 'required|date',
            'rating' => 'nullable|string',
            'description' => 'nullable|string',
            'actors' => 'required|array',  // Ensure actors are selected as an array
        ];
    }

    public function trash()
    {
        $movies = Movie::onlyTrashed()->get();
        return view('movies.trash', compact('movies'));
    }

    public function restore($id)
    {
        $movie = Movie::onlyTrashed()->findOrFail($id);
        $movie->restore();

        return redirect()->route('movies.index')->with('success', 'Movie restored successfully!');
    }
}
