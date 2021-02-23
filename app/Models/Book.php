<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Carbon;

class Book extends Model
{
    use HasFactory;

    /*public function getRouteKeyName() {
        return 'slug';
    }*/

    protected $fillable = ['user_id', 'title', 'price', 'cover_img', 'discount', 'approved', 'description', 'slug'];

    public function lastWeek($bookDate) {
        if( $bookDate > Carbon::now()->startOfWeek() && $bookDate < Carbon::now()->endOfWeek()){
            return true;
        }
    }
    public function countBooks($whatCheck) {
        $books = Book::where('approved', $whatCheck)->get();
        $number = $books->count();
        return $number;
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
    public function reports() {
        return $this->hasMany(Report::class);
    }
    public function genres() {
        return $this->belongsToMany(Genre::class);
    }
    Public function authors() {
        return $this->belongsToMany(Author::class);
    }
    public function comments() {
        return $this->hasMany(Comment::class);
    }
    public function scopeApproved($query) {
        return $query->where('approved', 1);
    }
}
