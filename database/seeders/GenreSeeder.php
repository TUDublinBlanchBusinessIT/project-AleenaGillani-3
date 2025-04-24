<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genre;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class GenreSeeder extends Seeder
{
    public function run(): void
    {
        $genres = [
            ['name' => 'Action', 'description' => 'Fast-paced movies with lots of excitement.'],
            ['name' => 'Comedy', 'description' => 'Funny and entertaining films.'],
            ['name' => 'Drama', 'description' => 'Emotional and narrative-driven stories.'],
            ['name' => 'Horror', 'description' => 'Scary movies with suspense.'],
            ['name' => 'Sci-Fi', 'description' => 'Science fiction and futuristic themes.'],
        ];

        foreach ($genres as $genre) {
            Genre::create($genre);
        }
    }
}
