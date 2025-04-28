<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovieActorTable extends Migration
{
    public function up(): void
    {
        Schema::create('movie_actor', function (Blueprint $table) {
            $table->id();
            $table->foreignId('movie_id')->constrained()->onDelete('cascade'); // references movies table
            $table->foreignId('actor_id')->constrained()->onDelete('cascade'); // references actors table
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('movie_actor');
    }
}
