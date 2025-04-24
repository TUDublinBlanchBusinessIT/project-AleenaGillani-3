<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movie extends Model
{
    use HasFactory, SoftDeletes;

    // Define fillable fields for mass assignment
    protected $fillable = ['title', 'genre_id', 'release_date', 'rating', 'description'];

    /**
     * Get the genre that owns the movie.
     */
    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
