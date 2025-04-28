<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Movie;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        // Fetch all reviews and their associated movies
        $reviews = Review::with('movie')->get(); // Fetch reviews with associated movies
        $movies = Movie::with('reviews')->get(); // Get all movies and eager load their reviews

        // Loop through each movie and calculate its average rating
        foreach ($movies as $movie) {
            // Calculate the average rating for each movie based on its reviews
            $averageRating = $movie->reviews->avg('rating'); // Get the average rating for the movie
            $movie->average_rating = $averageRating ?: null; // Set the average rating or null if no reviews exist

            // Debugging log to ensure the average rating is calculated
            \Log::info("Movie: " . $movie->title . " - Average Rating: " . $movie->average_rating);
        }

        // Pass both reviews and movies with average ratings to the view
        return view('reviews.index', compact('reviews', 'movies'));
    }

    public function create()
    {
        $movies = Movie::all(); // Get all movies
        return view('reviews.create', compact('movies')); // Pass movies to the create view
    }

    public function store(Request $request)
    {
        // Validate the review input
        $validated = $request->validate([
            'movie_id' => 'required|exists:movies,id',
            'reviewer' => 'required|string|max:255',
            'rating' => 'required|numeric|min:1|max:10',
            'comment' => 'nullable|string',
        ]);

        // Create the new review in the database
        Review::create($validated);
        return redirect()->route('reviews.index')->with('success', 'Review created successfully.'); // Redirect back to the reviews list
    }

    public function show($id)
    {
        // Find the specific review with its associated movie
        $review = Review::with('movie')->findOrFail($id);
        return view('reviews.show', compact('review')); // Pass the review to the show view
    }

    public function edit($id)
    {
        // Find the specific review to edit
        $review = Review::findOrFail($id);
        $movies = Movie::all(); // Get all movies for the dropdown
        return view('reviews.edit', compact('review', 'movies')); // Pass the review and movies to the edit view
    }

    public function update(Request $request, $id)
    {
        // Validate the review input
        $validated = $request->validate([
            'movie_id' => 'required|exists:movies,id',
            'reviewer' => 'required|string|max:255',
            'rating' => 'required|numeric|min:1|max:10',
            'comment' => 'nullable|string',
        ]);

        // Find the review and update it
        $review = Review::findOrFail($id);
        $review->update($validated);

        return redirect()->route('reviews.index')->with('success', 'Review updated successfully.'); // Redirect back to the reviews list
    }

    public function destroy($id)
    {
        // Find the specific review to delete
        $review = Review::findOrFail($id);
        $review->delete();

        return redirect()->route('reviews.index')->with('success', 'Review deleted.'); // Redirect back to the reviews list
    }
}
