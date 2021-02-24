<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\BooksResource;
use App\Http\Resources\AuthorsResource;


use App\Models\Book;

class BooksController extends Controller
{
    public function index() {
       
        $books = Book::approved()->with('authors')->with('genres');
        return BooksResource::collection($books->get());
    }
    public function show(Book $book) {

        $book->load('authors', 'genres');
        return new BooksResource($book);
    }
}
