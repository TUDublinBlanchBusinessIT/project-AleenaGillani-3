<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['movie_id', 'reviewer', 'rating', 'comment'];

    public function movie()
    {
        return $this->belongsTo(\App\Models\Movie::class);
    }
}
