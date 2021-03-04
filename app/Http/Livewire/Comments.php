<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Comment;
use App\Models\Book;

class Comments extends Component
{   
    public $book;
    public $val;

    protected $listeners = [
        'refreshParent' => '$refresh'
    ];
    public function mount($book)
    {   
        $this->book = $book;
        
    }
    public function render()
    {   
        //$comments = $this->book->comments()->with('user');
        return view('livewire.comments', [
            'comments' => Comment::where('book_id', $this->book)->get()
        ]);
    }
}
