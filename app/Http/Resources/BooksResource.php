<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

use App\Models\Author;
use App\Models\Book;

class BooksResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'cover_img' => asset($this->cover_img),
            'description' => $this->when($request->book, $this->description),
            'authors' => $this->authors()->pluck('name')->implode(', '),
            'genres' => $this->genres()->pluck('name')->implode(', ')
        ];
    }
}
