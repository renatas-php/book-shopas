<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $casts = [
        'genre' => 'array'
    ];

    protected $fillable = ['user_id', 'title', 'author', 'genre', 
    'price', 'cover_img', 'discount', 'approved', 'description'];

    public $genres = ['Drama', 'Karinis', 'Siaubo', 'Fantastinis', 
        'Dokumentinis', 'Detektyvas', 'Biografija', 'Nuotykių'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
