<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Genre;

class GenresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Genre::factory()->times(100)->create();
    }
}
