<!-- resources/views/movies/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Movies List</h1>
    <a href="{{ route('movies.create') }}">Add New Movie</a>
    @if($movies->count())
        <ul>
            @foreach ($movies as $movie)
                <li>
                    {{ $movie->title }} -
                    <a href="{{ route('movies.show', $movie->id) }}">View</a> |
                    <a href="{{ route('movies.edit', $movie->id) }}">Edit</a> |
                    <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @else
        <p>No movies found.</p>
    @endif
@endsection
