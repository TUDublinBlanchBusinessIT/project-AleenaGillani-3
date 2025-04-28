<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Review;
use App\Models\Movie;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        // Get all the movies from the database
        $movies = Movie::all();

        // Define a larger set of reviews for each movie
        $reviews = [
            // Movie 1
            ['movie_id' => $movies[0]->id, 'reviewer' => 'Alex Johnson', 'rating' => 8, 'comment' => 'Loved the intensity and action.'],
            ['movie_id' => $movies[0]->id, 'reviewer' => 'Sarah White', 'rating' => 7, 'comment' => 'Great action scenes but the plot was weak.'],
            ['movie_id' => $movies[0]->id, 'reviewer' => 'David Clark', 'rating' => 9, 'comment' => 'Amazing visual effects, but lacked character depth.'],
            ['movie_id' => $movies[0]->id, 'reviewer' => 'Maria Garcia', 'rating' => 10, 'comment' => 'Perfect movie! Loved the entire experience.'],

            // Movie 2
            ['movie_id' => $movies[1]->id, 'reviewer' => 'Jamie Lee', 'rating' => 7, 'comment' => 'Very funny and heartwarming.'],
            ['movie_id' => $movies[1]->id, 'reviewer' => 'Ethan Walker', 'rating' => 8, 'comment' => 'Enjoyed it a lot, a bit predictable though.'],
            ['movie_id' => $movies[1]->id, 'reviewer' => 'Oliver Scott', 'rating' => 6, 'comment' => 'Good, but not as funny as I expected.'],
            ['movie_id' => $movies[1]->id, 'reviewer' => 'Alice King', 'rating' => 9, 'comment' => 'A true gem of comedy!'],

            // Movie 3
            ['movie_id' => $movies[2]->id, 'reviewer' => 'Morgan Smith', 'rating' => 9, 'comment' => 'Beautiful storytelling and characters.'],
            ['movie_id' => $movies[2]->id, 'reviewer' => 'Lucas Brown', 'rating' => 8, 'comment' => 'A bit slow at first, but a great emotional journey.'],
            ['movie_id' => $movies[2]->id, 'reviewer' => 'Zoe Miller', 'rating' => 10, 'comment' => 'I loved every minute of it! A masterpiece.'],
            ['movie_id' => $movies[2]->id, 'reviewer' => 'Amelia Davis', 'rating' => 7, 'comment' => 'The plot was nice, but the pacing was off at times.'],

            // Movie 4
            ['movie_id' => $movies[3]->id, 'reviewer' => 'Chris Allen', 'rating' => 6, 'comment' => 'Creepy and suspenseful, good for a scare.'],
            ['movie_id' => $movies[3]->id, 'reviewer' => 'Eva Harris', 'rating' => 5, 'comment' => 'Too predictable, not much of a scare.'],
            ['movie_id' => $movies[3]->id, 'reviewer' => 'Jackie Lee', 'rating' => 7, 'comment' => 'Interesting concept, but lacked execution.'],
            ['movie_id' => $movies[3]->id, 'reviewer' => 'Nathan Turner', 'rating' => 8, 'comment' => 'A solid horror movie, good suspense.'],

            // Movie 5
            ['movie_id' => $movies[4]->id, 'reviewer' => 'Taylor Ray', 'rating' => 8, 'comment' => 'Amazing visual effects and story.'],
            ['movie_id' => $movies[4]->id, 'reviewer' => 'Kaitlyn Roberts', 'rating' => 9, 'comment' => 'A visual spectacle, but the story could have been stronger.'],
            ['movie_id' => $movies[4]->id, 'reviewer' => 'James Davis', 'rating' => 7, 'comment' => 'Impressive visuals, but felt like something was missing.'],
            ['movie_id' => $movies[4]->id, 'reviewer' => 'Sophia Martin', 'rating' => 10, 'comment' => 'An unforgettable experience, highly recommended!'],

            // Movie 6 (Shadows of Time)
            ['movie_id' => $movies[5]->id, 'reviewer' => 'Ella Thomas', 'rating' => 8, 'comment' => 'A touching and beautiful story.'],
            ['movie_id' => $movies[5]->id, 'reviewer' => 'Benjamin Green', 'rating' => 7, 'comment' => 'Good story but the pacing was a bit slow.'],
            ['movie_id' => $movies[5]->id, 'reviewer' => 'Sophia Anderson', 'rating' => 9, 'comment' => 'Deep and emotional. Great performances.'],

            // Movie 7 (Galaxy Force)
            ['movie_id' => $movies[6]->id, 'reviewer' => 'Michael Scott', 'rating' => 6, 'comment' => 'Great visuals but the story was lacking.'],
            ['movie_id' => $movies[6]->id, 'reviewer' => 'Rebecca Davis', 'rating' => 7, 'comment' => 'Enjoyable but not memorable.'],
            ['movie_id' => $movies[6]->id, 'reviewer' => 'Evan Jackson', 'rating' => 8, 'comment' => 'Fun ride, just not much depth.'],

            // Movie 8 (Haunted Hollow)
            ['movie_id' => $movies[7]->id, 'reviewer' => 'Olivia Clarke', 'rating' => 9, 'comment' => 'A thrilling horror experience.'],
            ['movie_id' => $movies[7]->id, 'reviewer' => 'Nathaniel Brooks', 'rating' => 8, 'comment' => 'Suspenseful with a good twist.'],
            ['movie_id' => $movies[7]->id, 'reviewer' => 'Abigail Scott', 'rating' => 7, 'comment' => 'Good movie, but not as scary as expected.'],

            // Movie 9 (The Big Giggle)
            ['movie_id' => $movies[8]->id, 'reviewer' => 'Daniel Kim', 'rating' => 8, 'comment' => 'Hilarious from start to finish!'],
            ['movie_id' => $movies[8]->id, 'reviewer' => 'Lily Stone', 'rating' => 9, 'comment' => 'Great comedy with great performances.'],

            // Movie 10 (Defenders of Earth)
            ['movie_id' => $movies[9]->id, 'reviewer' => 'Henry Johnson', 'rating' => 7, 'comment' => 'Great action, but lacking depth.'],
            ['movie_id' => $movies[9]->id, 'reviewer' => 'Grace Lee', 'rating' => 8, 'comment' => 'Entertaining but could have been better.'],

            // Movie 11 (Twilight)
            ['movie_id' => $movies[10]->id, 'reviewer' => 'Sophie Brown', 'rating' => 9, 'comment' => 'An emotional and gripping story.'],
            ['movie_id' => $movies[10]->id, 'reviewer' => 'Jesse Collins', 'rating' => 7, 'comment' => 'I loved the characters, but the plot was predictable.'],

            // Movie 12 (Twilight)
            ['movie_id' => $movies[11]->id, 'reviewer' => 'Ava Scott', 'rating' => 6, 'comment' => 'Great visuals but the story didn’t capture me.'],
            ['movie_id' => $movies[11]->id, 'reviewer' => 'Lucas Harris', 'rating' => 8, 'comment' => 'Loved the chemistry between the leads, but the pacing was off.'],
        ];

        // Loop through each review and create a new record
        foreach ($reviews as $review) {
            // Check if the review already exists for the same movie (based on movie_id and reviewer)
            if (!Review::where('movie_id', $review['movie_id'])->where('reviewer', $review['reviewer'])->exists()) {
                Review::create($review);  // Create the new review if it doesn't exist
            }
        }
    }
}
