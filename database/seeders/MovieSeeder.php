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
        $genres = Genre::all();

        $movies = [
            ['title' => 'The Last Stand', 'genre_id' => $genres[0]->id, 'release_date' => '2020-05-01', 'rating' => '7.5', 'description' => 'An action-packed thriller.'],
            ['title' => 'Laugh It Off', 'genre_id' => $genres[1]->id, 'release_date' => '2019-08-10', 'rating' => '6.8', 'description' => 'A hilarious comedy that never stops.'],
            ['title' => 'Broken Hearts', 'genre_id' => $genres[2]->id, 'release_date' => '2021-11-22', 'rating' => '8.2', 'description' => 'A dramatic tale of love and loss.'],
            ['title' => 'Night Terrors', 'genre_id' => $genres[3]->id, 'release_date' => '2018-10-31', 'rating' => '6.5', 'description' => 'A horror story you won’t forget.'],
            ['title' => 'Future World', 'genre_id' => $genres[4]->id, 'release_date' => '2022-01-15', 'rating' => '7.9', 'description' => 'A sci-fi journey into the unknown.'],
        ];

        foreach ($movies as $movie) {
            Movie::create($movie);
        }
    }
}