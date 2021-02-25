<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
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
            'description' => $this->description,
            'authors' => $this->authors()->pluck('name')->implode(', '),
            'genres' => $this->genres()->pluck('name')->implode(', ')
            ];
    }
}
