<?php

namespace App\Http\Controllers;

use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Comment;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {     
        return view('index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $book = '';
        return view('knygos.ideti')->with(compact('book'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        $file = $request->file('cover_img')->store('covers');

        $bookInsert = Book::create([
            'user_id' => auth()->user()->id,
            'title' => $request->title,
            'author' => $request->author,
            'genre' => $request->genre,
            'price' => $request->price,
            'cover_img' => $file,
            'description' => $request->description,
            'approved' => false
        ]);

        return view('index')->with('ok', 'Knygos pasiūlymas įkeltas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {   
        $comments = Comment::where('book_id', $book->id)->get();
        return view('knygos.pavienis')->with(compact('book'))
        ->with('comments', $comments);
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
    public function update(Request $request, Book $book)
    {

        $data = $request->only(['title', 'author', 'genre', 'price',
         'cover_img', 'discount', 'description']);
        
        if($request->file('cover_img')){
        
            $file = $request->file('cover_img')->store('covers');           

            $data['cover_img'] = $file;
        }                
        
        $book->update($data);

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

        return redirect()->back();
    }
}
