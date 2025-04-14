<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all genres
        $genres = Genre::all();
        return view('genres.index', compact('genres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('genres.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate and store the new genre
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Genre::create($validated);

        return redirect()->route('genres.index')
            ->with('success', 'Genre created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Find and display a single genre
        $genre = Genre::findOrFail($id);
        return view('genres.show', compact('genre'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Find genre to edit
        $genre = Genre::findOrFail($id);
        return view('genres.edit', compact('genre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate and update the genre
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $genre = Genre::findOrFail($id);
        $genre->update($validated);

        return redirect()->route('genres.index')
            ->with('success', 'Genre updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find and delete the genre
        $genre = Genre::findOrFail($id);
        $genre->delete();

        return redirect()->route('genres.index')
            ->with('success', 'Genre deleted successfully.');
    }
}
