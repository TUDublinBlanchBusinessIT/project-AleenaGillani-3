<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class GenreSeeder extends Seeder
{
    public function run()
    {
        $now = Carbon::now();
        DB::table('genres')->insert([
            ['name' => 'Action', 'description' => 'High energy, lots of stunts', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Comedy', 'description' => 'Laugh-out-loud fun',     'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Drama',  'description' => 'Serious storytelling',     'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Sci-Fi', 'description' => 'Futuristic and fantastic', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
