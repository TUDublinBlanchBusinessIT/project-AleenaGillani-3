@extends('layouts.bootstrap')

@section('content')
<div class="container">
    <h1 class="mb-4">Add New Review</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('reviews.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="movie_id">Movie:</label>
            <select name="movie_id" class="form-control" required>
                @foreach ($movies as $movie)
                    <option value="{{ $movie->id }}">{{ $movie->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="reviewer">Reviewer Name:</label>
            <input type="text" name="reviewer" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="rating">Rating (out of 10):</label>
            <select name="rating" id="rating" class="form-control" required>
                @for ($i = 10; $i >= 1; $i--)
                    <option value="{{ $i }}">{{ $i }} / 10</option>
                @endfor
            </select>
        </div>

        <div class="form-group">
            <label for="comment">Comment:</label>
            <textarea name="comment" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Submit Review</button>
    </form>
</div>
@endsection
