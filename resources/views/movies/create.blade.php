@extends('layouts.bootstrap')

@section('content')
<h1>Add New Movie</h1>

<form action="{{ route('movies.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="genre_id">Genre</label>
        <select name="genre_id" class="form-control" required>
            @foreach($genres as $genre)
                <option value="{{ $genre->id }}">{{ $genre->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="release_date">Release Date</label>
        <input type="date" name="release_date" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="rating">Rating</label>
        <input type="text" name="rating" class="form-control">
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" class="form-control"></textarea>
    </div>

    <button type="submit" class="btn btn-primary mt-3">Add Movie</button>
</form>
@endsection
