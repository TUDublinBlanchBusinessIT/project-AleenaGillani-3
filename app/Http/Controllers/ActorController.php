<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    public function index()
    {
        $actors = Actor::all();
        return view('actors.index', compact('actors'));
    }

    public function create()
    {
        return view('actors.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'biography' => 'nullable|string',
            'birth_date' => 'nullable|date',
        ]);

        Actor::create($validated);

        return redirect()->route('actors.index')->with('success', 'Actor added successfully.');
    }

    public function show($id)
    {
        $actor = Actor::findOrFail($id);
        return view('actors.show', compact('actor'));
    }

    public function edit($id)
    {
        $actor = Actor::findOrFail($id);
        return view('actors.edit', compact('actor'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'biography' => 'nullable|string',
            'birth_date' => 'nullable|date',
        ]);

        $actor = Actor::findOrFail($id);
        $actor->update($validated);

        return redirect()->route('actors.index')->with('success', 'Actor updated successfully.');
    }

    public function destroy($id)
    {
        $actor = Actor::findOrFail($id);
        $actor->delete();

        return redirect()->route('actors.index')->with('success', 'Actor deleted.');
    }

    public function trash()
    {
        $actors = Actor::onlyTrashed()->get();
        return view('actors.trash', compact('actors'));
    }

    public function restore($id)
    {
        $actor = Actor::onlyTrashed()->findOrFail($id);
        $actor->restore();

        return redirect()->route('actors.index')->with('success', 'Actor restored successfully!');
    }

}
