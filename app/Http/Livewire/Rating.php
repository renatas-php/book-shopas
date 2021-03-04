<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Comment;

class Rating extends Component
{   
    public $book;

    protected $listeners = [
        'refreshParent' => '$refresh'
    ];

    public function mount($book)
    {   
        $this->book = $book;
        
    }

    public function render()
    {   
        $this->emit('refreshParent');
        return view('livewire.rating', [
            'commentsAvg' => Comment::where('book_id', $this->book)->pluck('rating')->avg()
            ]);
    }
}
