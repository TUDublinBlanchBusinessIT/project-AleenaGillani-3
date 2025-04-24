<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Review;
use App\Models\Movie;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        $movies = Movie::all();

        $reviews = [
            ['movie_id' => $movies[0]->id, 'reviewer' => 'Alex Johnson', 'rating' => 8, 'comment' => 'Loved the intensity and action.'],
            ['movie_id' => $movies[1]->id, 'reviewer' => 'Jamie Lee', 'rating' => 7, 'comment' => 'Very funny and heartwarming.'],
            ['movie_id' => $movies[2]->id, 'reviewer' => 'Morgan Smith', 'rating' => 9, 'comment' => 'Beautiful storytelling and characters.'],
            ['movie_id' => $movies[3]->id, 'reviewer' => 'Chris Allen', 'rating' => 6, 'comment' => 'Creepy and suspenseful, good for a scare.'],
            ['movie_id' => $movies[4]->id, 'reviewer' => 'Taylor Ray', 'rating' => 8, 'comment' => 'Amazing visual effects and story.'],
        ];

        foreach ($reviews as $review) {
            Review::create($review);
        }
    }
}