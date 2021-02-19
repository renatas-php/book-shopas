<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Book;
use App\Models\Genre;
use App\Models\Author;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Book::factory()->times(120)->create()->each(function($book) {
            $genres = Genre::all()->random(rand(1,3))->pluck('id');
            $book->genres()->attach($genres);
            $authors = Author::all()->random(rand(1,3))->pluck('id');
            $book->authors()->attach($authors);
        });
    }
}
