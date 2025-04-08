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
        // Adding foreign key to the 'movies' table
        Schema::table('movies', function (Blueprint $table) {
            $table->foreign('genre_id')  // Add foreign key constraint on 'genre_id'
                  ->references('id')  // It references the 'id' column in the 'genres' table
                  ->on('genres')  // Specifies the 'genres' table
                  ->onDelete('cascade');  // If a genre is deleted, all related movies will be deleted
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Dropping foreign key if the migration is rolled back
        Schema::table('movies', function (Blueprint $table) {
            $table->dropForeign(['genre_id']);  // Drop the foreign key on 'genre_id'
        });
    }
};
