<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\BooksResource;

use App\Models\Book;

class BooksController extends Controller
{
    public function index() {
        return Book::approved()->with('authors')->with('genres')->get();
    }
    public function show(Book $book) {
        return new BooksResource($book);
    }
}
