<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::all();
        return view('genres.index', compact('genres'));
    }

    public function create()
    {
        return view('genres.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate($this->genreRules());

        Genre::create($validated);

        return redirect()->route('genres.index')
            ->with('success', 'Genre created successfully.');
    }

    public function show(string $id)
    {
        $genre = Genre::findOrFail($id);
        return view('genres.show', compact('genre'));
    }

    public function edit(string $id)
    {
        $genre = Genre::findOrFail($id);
        return view('genres.edit', compact('genre'));
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate($this->genreRules());

        $genre = Genre::findOrFail($id);
        $genre->update($validated);

        return redirect()->route('genres.index')
            ->with('success', 'Genre updated successfully.');
    }

    public function destroy(string $id)
    {
        $genre = Genre::findOrFail($id);
        $genre->delete();

        return redirect()->route('genres.index')
            ->with('success', 'Genre deleted successfully.');
    }

    // ✅ Soft delete: Show trashed genres
    public function trash()
    {
        $genres = Genre::onlyTrashed()->get();
        return view('genres.trash', compact('genres'));
    }

    // ✅ Soft delete: Restore genre
    public function restore($id)
    {
        $genre = Genre::onlyTrashed()->findOrFail($id);
        $genre->restore();

        return redirect()->route('genres.index')->with('success', 'Genre restored successfully!');
    }

    protected function genreRules(): array
    {
        return [
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
        ];
    }
}
