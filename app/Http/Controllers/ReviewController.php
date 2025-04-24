<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Movie;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::with('movie')->get();
        return view('reviews.index', compact('reviews'));
    }

    public function create()
    {
        $movies = Movie::all();
        return view('reviews.create', compact('movies'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'movie_id' => 'required|exists:movies,id',
            'reviewer' => 'required|string|max:255',
            'rating' => 'required|numeric|min:1|max:10',
            'comment' => 'nullable|string',
        ]);

        Review::create($validated);
        return redirect()->route('reviews.index')->with('success', 'Review created successfully.');
    }

    public function show($id)
    {
        $review = Review::with('movie')->findOrFail($id);
        return view('reviews.show', compact('review'));
    }

    public function edit($id)
    {
        $review = Review::findOrFail($id);
        $movies = Movie::all();
        return view('reviews.edit', compact('review', 'movies'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'movie_id' => 'required|exists:movies,id',
            'reviewer' => 'required|string|max:255',
            'rating' => 'required|numeric|min:1|max:10',
            'comment' => 'nullable|string',
        ]);

        $review = Review::findOrFail($id);
        $review->update($validated);

        return redirect()->route('reviews.index')->with('success', 'Review updated successfully.');
    }

    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();

        return redirect()->route('reviews.index')->with('success', 'Review deleted.');
    }
}
