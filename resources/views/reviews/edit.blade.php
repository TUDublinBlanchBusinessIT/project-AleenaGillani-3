@extends('layouts.bootstrap')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Review</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('reviews.update', $review->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="movie_id">Movie:</label>
            <select name="movie_id" class="form-control" required>
                @foreach ($movies as $movie)
                    <option value="{{ $movie->id }}" {{ $review->movie_id == $movie->id ? 'selected' : '' }}>
                        {{ $movie->title }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="reviewer">Reviewer Name:</label>
            <input type="text" name="reviewer" class="form-control" value="{{ $review->reviewer }}" required>
        </div>

        <div class="form-group">
            <label for="rating">Rating (1-10):</label>
            <input type="number" name="rating" class="form-control" min="1" max="10" value="{{ $review->rating }}" required>
        </div>

        <div class="form-group">
            <label for="comment">Comment:</label>
            <textarea name="comment" class="form-control">{{ $review->comment }}</textarea>
        </div>

        <button type="submit" class="btn btn-success mt-3">Update Review</button>
    </form>
</div>
@endsection
