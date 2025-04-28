<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Movie;         
use App\Models\Genre;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MovieSeeder extends Seeder
{
    public function run(): void
    {
        // Fetch all the genres from the database
        $genres = Genre::all();

        // Ensure there are genres available before proceeding
        if ($genres->isEmpty()) {
            echo "No genres found in the database. Please seed genres first.\n";
            return;
        }

        // Define the movies to be seeded
        $movies = [
            ['title' => 'The Last Stand', 'genre_id' => $genres[0]->id, 'release_date' => '2020-05-01', 'rating' => 7.5, 'description' => 'An action-packed thriller.'],
            ['title' => 'Laugh It Off', 'genre_id' => $genres[1]->id, 'release_date' => '2019-08-10', 'rating' => 6.8, 'description' => 'A hilarious comedy that never stops.'],
            ['title' => 'Broken Hearts', 'genre_id' => $genres[2]->id, 'release_date' => '2021-11-22', 'rating' => 8.2, 'description' => 'A dramatic tale of love and loss.'],
            ['title' => 'Night Terrors', 'genre_id' => $genres[3]->id, 'release_date' => '2018-10-31', 'rating' => 6.5, 'description' => 'A horror story you won’t forget.'],
            ['title' => 'Future World', 'genre_id' => $genres[4]->id, 'release_date' => '2022-01-15', 'rating' => 7.9, 'description' => 'A sci-fi journey into the unknown.'],
            ['title' => 'Shadows of Time', 'genre_id' => $genres[2]->id, 'release_date' => '2021-04-12', 'rating' => 8.0, 'description' => 'An emotional drama spanning decades.'],
            ['title' => 'Galaxy Force', 'genre_id' => $genres[4]->id, 'release_date' => '2023-07-20', 'rating' => 7.7, 'description' => 'An interstellar battle for survival.'],
            ['title' => 'Haunted Hollow', 'genre_id' => $genres[3]->id, 'release_date' => '2020-10-15', 'rating' => 6.9, 'description' => 'A horror adventure in a cursed village.'],
            ['title' => 'The Big Giggle', 'genre_id' => $genres[1]->id, 'release_date' => '2022-02-25', 'rating' => 7.2, 'description' => 'The funniest stand-up comedy movie ever.'],
            ['title' => 'Defenders of Earth', 'genre_id' => $genres[4]->id, 'release_date' => '2024-05-01', 'rating' => 8.4, 'description' => 'Sci-fi heroes saving the planet from invasion.'],
        ];

        // Loop through each movie and create or update it in the database
        foreach ($movies as $movie) {
            Movie::firstOrCreate(
                ['title' => $movie['title']],  // Ensure unique title
                [
                    'genre_id' => $movie['genre_id'],
                    'release_date' => Carbon::parse($movie['release_date']),
                    'rating' => (float)$movie['rating'],  // Ensure rating is a float
                    'description' => $movie['description'],
                ]
            );
        }

        echo "Movies seeded successfully!\n";
    }
}
