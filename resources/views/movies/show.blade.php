@extends('layouts.app')

@section('content')
    <h1>Movie Details</h1>
    <h2>{{ $movie->title }}</h2>
    <p><strong>Genre:</strong> {{ $movie->genre->name }}</p>
    <p><strong>Release Date:</strong> {{ $movie->release_date }}</p>
    <p><strong>Rating:</strong> {{ $movie->rating }}</p>
    <p><strong>Description:</strong> {{ $movie->description }}</p>

    <a href="{{ route('movies.edit', $movie->id) }}">Edit Movie</a>
    <a href="{{ route('movies.index') }}">Back to Movies List</a>
@endsection
