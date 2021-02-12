<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Carbon;

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

    public function lastWeek($bookDate) {
        if( $bookDate > Carbon::now()->startOfWeek() && $bookDate < Carbon::now()->endOfWeek()){
            return true;
        }
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
    public function reports() {
        return $this->hasMany(Report::class);
    }
}
