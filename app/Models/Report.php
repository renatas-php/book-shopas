<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = ['book_id', 'user_id', 'reason', 'description'];

    public function user() {
        return $this->belongsTo(Report::class);
    }
    public function book() {
        return $this->belongsTo(Book::class);
    }
}
