<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Book;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Book::factory()->times(120)->create();
    }
}
