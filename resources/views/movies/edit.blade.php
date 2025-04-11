<!-- resources/views/movies/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Edit Movie</h1>
    <form action="{{ route('movies.update', $movie->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div>
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" value="{{ old('title', $movie->title) }}" required>
        </div>

        <div>
            <label for="genre_id">Genre:</label>
            <select name="genre_id" id="genre_id" required>
                @foreach ($genres as $genre)
                    <option value="{{ $genre->id }}" {{ $genre->id == $movie->genre_id ? 'selected' : '' }}>
                        {{ $genre->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="release_date">Release Date:</label>
            <input type="date" name="release_date" id="release_date" value="{{ old('release_date', $movie->release_date) }}" required>
        </div>

        <div>
            <label for="rating">Rating:</label>
            <input type="text" name="rating" id="rating" value="{{ old('rating', $movie->rating) }}">
        </div>

        <div>
            <label for="description">Description:</label>
            <textarea name="description" id="description">{{ old('description', $movie->description) }}</textarea>
        </div>

        <button type="submit">Update Movie</button>
    </form>
@endsection
