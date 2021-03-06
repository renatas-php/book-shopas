<?php

namespace App\Http\Controllers;

use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Requests\BookCreateRequest;
use App\Http\Requests\BookUpdateRequest;
use Illuminate\Support\Str;

use App\Notifications\BookApproved;


use App\Models\Book;
use App\Models\Comment;
use App\Models\Author;
use App\Models\Genre;
use App\Models\User;


class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {     
        $books = new Book();
        if(request()->filled('title')){
            $books = Book::with('authors')->with('genres')->where('title', 'like', '%' . request('title') . '%')
            ->orWhere('description', 'like', '%' . request('title') . '%');                   
        }
        $books = $books->with('authors')->with('genres')->latest()->where('approved', true)->simplePaginate(25)->appends([
            'title' => request('title')
        ]);

        return view('index')
        ->with('books', $books);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return view('knygos.ideti')->with('authors', Author::all())->with('genres', Genre::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookCreateRequest $request)
    {   
        $slug = str::slug($request->title);

        $file = 'default_cover.jpg';
        if($request->file('cover_img')){
        $file = $request->file('cover_img')->store('covers');
        }
        
        $bookInsert = Book::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'price' => $request->price,
            'cover_img' => $file,
            'description' => $request->description,
            'approved' => false,
            'slug' => $slug
        ]);

        if($request->genre) {
            $bookInsert->genres()->attach($request->genre);
        }
        if($request->author) {
            $bookInsert->authors()->attach($request->author);
        }

        return redirect()->route('index')->with('ok', 'Knygos pasiūlymas įkeltas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {   
        $rating = Comment::where('book_id', $book->id)->pluck('rating')->avg();
        return view('knygos.pavienis')->with(compact('book', 'rating'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('knygos.ideti')->with(compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookUpdateRequest $request, Book $book)
    {

        if($request->file('cover_img')){
            $file = $request->file('cover_img')->store('covers');           
        }        
        $book->update([
            'title' => $request->title,
            'price' => $request->price,
            'discount' => $request->discount,
            'description' => $request->description,
        ]);
        if($request->genre) {
            $book->genres()->attach($request->genre);
        }
        if($request->author) {
            $book->authors()->attach($request->author);
        }

        session()->flash('ok', 'Informacija apie knygą atnaujinta');

        return redirect()->route('valdymo-panele');
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

    public function approve($id) {

        $approveBook = Book::where('id', $id);

        $data['approved'] = true;             
        $approveBook->update($data);

        $user_id = Book::where('id', $id)->pluck('user_id');
        //dd($user_id);
        $book_id = $id;
        $user = User::where('id', $user_id)->first();
        $user->notify(new BookApproved($book_id, $user_id));

        return redirect()->back();
    }

}
