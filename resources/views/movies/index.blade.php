@extends('layouts.bootstrap')

@section('content')
<div class="container">
    <h1>Movies</h1>

    <!-- Search and Filter Form -->
    <form action="{{ route('movies.index') }}" method="GET" class="mb-3">
        <div class="row">
            <div class="col-md-4">
                <input type="text" name="search" placeholder="Search by title..." class="form-control" value="{{ request('search') }}">
            </div>
            <div class="col-md-4">
                <select name="genre_id" class="form-control">
                    <option value="">All Genres</option>
                    @foreach($genres as $genre)
                        <option value="{{ $genre->id }}" {{ request('genre_id') == $genre->id ? 'selected' : '' }}>
                            {{ $genre->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
        </div>
    </form>

    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('movies.create') }}" class="btn btn-success">Add New Movie</a>
        <a href="{{ route('movies.trash') }}" class="btn btn-secondary">View Trash</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Release Date</th>
                <th>Genre</th>
                <th>Rating</th>
                <th>Actors</th> <!-- New column for actors -->
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($movies as $movie)  <!-- Loop through movies -->
            <tr>
                <td>{{ $movie->title }}</td>
                <td>{{ $movie->release_date }}</td>
                <td>{{ $movie->genre ? $movie->genre->name : 'N/A' }}</td>
                
                <!-- Display the numeric rating directly -->
                <td>{{ $movie->reviews->avg('rating') ?? 'N/A' }} / 10</td>

                <!-- Display Actors -->
                <td>
                    @foreach ($movie->actors as $actor) <!-- Loop through actors -->
                        {{ $actor->name }} @if(!$loop->last), @endif
                    @endforeach
                </td>

                <td>
                    <a href="{{ route('movies.show', $movie->id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form id="delete-form-{{ $movie->id }}" action="{{ route('movies.destroy', $movie->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $movie->id }})">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
