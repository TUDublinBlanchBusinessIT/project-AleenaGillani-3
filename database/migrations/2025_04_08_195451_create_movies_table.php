<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();  // Auto-increment primary key 'id'
            $table->string('title');  // Column for the movie's title
            $table->foreignId('genre_id')->constrained()->onDelete('cascade');  // Foreign key reference to genres
            $table->date('release_date');  // Release date of the movie
            $table->string('rating')->nullable();  // Rating (nullable)
            $table->text('description')->nullable();  // Description of the movie (nullable)
            $table->timestamps();  // Timestamps for created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');  // Drop the 'movies' table if it exists
    }
};
