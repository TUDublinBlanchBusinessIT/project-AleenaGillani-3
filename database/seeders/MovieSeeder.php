<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MovieSeeder extends Seeder
{
    public function run()
    {
        $now = Carbon::now();
        DB::table('movies')->insert([
            [
                'title'        => 'Edge of Tomorrow',
                'genre_id'     => 4,
                'release_date' => '2014-06-06',
                'rating'       => 'PG-13',
                'description'  => 'Time-loop sci-fi with Tom Cruise.',
                'created_at'   => $now,
                'updated_at'   => $now,
            ],
            [
                'title'        => 'The Dark Knight',
                'genre_id'     => 1,
                'release_date' => '2008-07-18',
                'rating'       => 'PG-13',
                'description'  => 'Batman vs. Joker in Gotham.',
                'created_at'   => $now,
                'updated_at'   => $now,
            ],
            [
                'title'        => 'The Grand Budapest Hotel',
                'genre_id'     => 2,
                'release_date' => '2014-03-28',
                'rating'       => 'R',
                'description'  => 'Wes Anderson’s whimsical comedy.',
                'created_at'   => $now,
                'updated_at'   => $now,
            ],
        ]);
    }
}
