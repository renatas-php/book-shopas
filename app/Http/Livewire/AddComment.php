<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Comment;

class AddComment extends Component
{   
    public $rating;
    public $comment;
    public $book;

    public function mount($book)
    {   
        $this->book = $book;
        
    }

    public function save() {
        $insertComment = Comment::create([
            'user_id' => auth()->id(),
            'book_id' => $this->book,
            'rating' => $this->rating,
            'comment' => $this->comment
        ]);
        $this->emit('refreshParent');
        $this->cleanValues();
    }

    public function cleanValues() {

        $this->rating = null;
        $this->comment = null;
    }
    public function render()
    {
        return view('livewire.add-comment');
    }
}
