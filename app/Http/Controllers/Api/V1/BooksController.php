<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\BooksResource;
use App\Http\Resources\BookResource;


use App\Models\Book;

class BooksController extends Controller
{
    public function index() {
       
        $books = Book::approved()->with('authors')->with('genres')->paginate(25);
        return BooksResource::collection($books);
    }
    public function show(Book $book) {
        
        $book->load('authors', 'genres');

        return new BooksResource($book);

        
    }
}
