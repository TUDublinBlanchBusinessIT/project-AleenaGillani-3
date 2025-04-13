@extends('layouts.app')

@section('content')
<h1>Movies</h1>
<a href="{{ route('movies.create') }}" class="btn btn-success mb-3">Add New Movie</a>
<table class="table table-bordered">
  <thead>
    <tr>
      <th>Title</th>
      <th>Release Date</th>
      <th>Genre</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($movies as $movie)
    <tr>
      <td>{{ $movie->title }}</td>
      <td>{{ $movie->release_date }}</td>
      <td>{{ $movie->genre ? $movie->genre->name : 'N/A' }}</td>
      <td>
        <a href="{{ route('movies.show', $movie->id) }}" class="btn btn-info btn-sm">View</a>
        <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-warning btn-sm">Edit</a>
        <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" style="display: inline-block;">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
