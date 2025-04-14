<!-- resources/views/movies/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Add New Movie</h1>

    <!-- Display Validation Errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('movies.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="title">Title:</label>
            <input 
                type="text" 
                name="title" 
                id="title" 
                class="form-control" 
                value="{{ old('title') }}" 
                required>
        </div>

        <div class="form-group">
            <label for="genre_id">Genre:</label>
            <select 
                name="genre_id" 
                id="genre_id" 
                class="form-control" 
                required>
                <option value="">Select Genre</option>
                @foreach ($genres as $genre)
                    <option value="{{ $genre->id }}" 
                        {{ old('genre_id') == $genre->id ? 'selected' : '' }}>
                        {{ $genre->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="release_date">Release Date:</label>
            <input 
                type="date" 
                name="release_date" 
                id="release_date" 
                class="form-control" 
                value="{{ old('release_date') }}" 
                required>
        </div>

        <div class="form-group">
            <label for="rating">Rating:</label>
            <input 
                type="text" 
                name="rating" 
                id="rating" 
                class="form-control" 
                value="{{ old('rating') }}">
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea 
                name="description" 
                id="description" 
                class="form-control">{{ old('description') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Add Movie</button>
    </form>
</div>
@endsection
