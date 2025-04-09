<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    // Define fillable fields for mass assignment
    protected $fillable = ['name'];

    /**
     * Get the movies for the genre.
     */
    public function movies()
    {
        return $this->hasMany(Movie::class);
    }
}
