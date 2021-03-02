<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentCreateRequest;

use App\Models\Comment;
use App\Models\Book;
use App\Http\Resources\CommentsResource;


class CommentsController extends Controller
{   

    public function comments(Book $book) {
        $comments = CommentsResource::collection($book->comments);
        return response()->json($comments);
    }
      /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentCreateRequest $request)
    {
        $commentInsert = Comment::create([
            'user_id' => auth()->user()->id,
            'book_id' => $request->book_id,
            'rating' => $request->rating,
            'comment' => $request->comment
        ]);
        
        return redirect()->back()->with('ok', 'Komentaras patalpintas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
