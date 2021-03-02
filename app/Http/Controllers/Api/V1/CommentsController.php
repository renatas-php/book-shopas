<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Resources\CommentsResource;
use App\Models\Book;
use App\Models\Comment;

class CommentsController extends Controller
{
    public function index(Book $book) {
        $comments = CommentsResource::collection($book->comments);
        return $comments;
    }
}
