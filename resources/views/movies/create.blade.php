@extends('layouts.bootstrap')

@section('content')
<h1>Add New Movie</h1>

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
        <label for="title">Title</label>
        <input 
            type="text" 
            name="title" 
            class="form-control @error('title') is-invalid @enderror" 
            value="{{ old('title') }}" 
            required>
    </div>

    <div class="form-group">
        <label for="genre_id">Genre</label>
        <select name="genre_id" class="form-control @error('genre_id') is-invalid @enderror" required>
            @foreach($genres as $genre)
                <option value="{{ $genre->id }}" {{ old('genre_id') == $genre->id ? 'selected' : '' }}>{{ $genre->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="release_date">Release Date</label>
        <input 
            type="date" 
            name="release_date" 
            class="form-control @error('release_date') is-invalid @enderror" 
            value="{{ old('release_date') }}" 
            required>
    </div>

    <div class="form-group">
        <label for="rating">Rating</label>
        <input 
            type="text" 
            name="rating" 
            class="form-control @error('rating') is-invalid @enderror" 
            value="{{ old('rating') }}">
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea 
            name="description" 
            class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
    </div>

    <div class="form-group">
        <label for="actors">Select Actors:</label>
        <div class="form-check">
            @foreach ($actors as $actor)
                <input type="checkbox" name="actors[]" value="{{ $actor->id }}" 
                    {{ in_array($actor->id, old('actors', [])) ? 'checked' : '' }} 
                    class="form-check-input">
                <label class="form-check-label">{{ $actor->name }}</label><br>
            @endforeach
        </div>
    </div>

    <button type="submit" class="btn btn-primary mt-3">Add Movie</button>
</form>
@endsection
