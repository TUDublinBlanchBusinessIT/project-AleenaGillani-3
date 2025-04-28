<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Actor extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'birth_date', 'biography'];

    protected $dates = ['birth_date', 'deleted_at'];

    public function movies()
{
    return $this->belongsToMany(Movie::class, 'movie_actor');
}


}


