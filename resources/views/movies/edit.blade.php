@extends('layouts.bootstrap')

@section('content')
<h1>Edit Movie</h1>

<form action="{{ route('movies.update', $movie->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control" value="{{ $movie->title }}" required>
    </div>

    <div class="form-group">
        <label for="genre_id">Genre</label>
        <select name="genre_id" class="form-control" required>
            @foreach($genres as $genre)
                <option value="{{ $genre->id }}" {{ $movie->genre_id == $genre->id ? 'selected' : '' }}>
                    {{ $genre->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="release_date">Release Date</label>
        <input type="date" name="release_date" class="form-control" value="{{ $movie->release_date }}" required>
    </div>

    <div class="form-group">
        <label for="rating">Rating</label>
        <input type="text" name="rating" class="form-control" value="{{ $movie->rating }}">
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" class="form-control">{{ $movie->description }}</textarea>
    </div>

    <button type="submit" class="btn btn-success mt-3">Update Movie</button>
</form>
@endsection
