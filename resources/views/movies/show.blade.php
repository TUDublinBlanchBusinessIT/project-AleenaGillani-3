@extends('layouts.bootstrap')

@section('content')
<h1>Movie Details</h1>

<div class="card">
    <div class="card-body">
        <h4 class="card-title">{{ $movie->title }}</h4>
        <p class="card-text"><strong>Genre:</strong> {{ $movie->genre ? $movie->genre->name : 'N/A' }}</p>
        <p class="card-text"><strong>Release Date:</strong> {{ $movie->release_date }}</p>
        <p class="card-text"><strong>Rating:</strong> {{ $movie->rating }}</p>
        <p class="card-text"><strong>Description:</strong> {{ $movie->description }}</p>
    </div>
</div>

<a href="{{ route('movies.index') }}" class="btn btn-secondary mt-3">Back to Movies</a>
@endsection
