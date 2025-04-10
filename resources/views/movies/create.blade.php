<!-- resources/views/movies/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Add New Movie</h1>
    <form action="{{ route('movies.store') }}" method="POST">
        @csrf

        <div>
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" required>
        </div>

        <div>
            <label for="genre_id">Genre:</label>
            <select name="genre_id" id="genre_id" required>
                @foreach ($genres as $genre)
                    <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="release_date">Release Date:</label>
            <input type="date" name="release_date" id="release_date" value="{{ old('release_date') }}" required>
        </div>

        <div>
            <label for="rating">Rating:</label>
            <input type="text" name="rating" id="rating" value="{{ old('rating') }}">
        </div>

        <div>
            <label for="description">Description:</label>
            <textarea name="description" id="description">{{ old('description') }}</textarea>
        </div>

        <button type="submit">Add Movie</button>
    </form>
@endsection
