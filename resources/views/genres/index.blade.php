@extends('layouts.bootstrap')

@section('content')
<h1>Genres</h1>

<a href="{{ route('genres.create') }}" class="btn btn-success mb-3">Add New Genre</a>

<table class="table table-bordered">
  <thead>
    <tr>
      <th>Name</th>
      <th>Description</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($genres as $genre)
    <tr>
      <td>{{ $genre->name }}</td>
      <td>{{ $genre->description }}</td>
      <td>
        <a href="{{ route('genres.show', $genre->id) }}" class="btn btn-info btn-sm">View</a>
        <a href="{{ route('genres.edit', $genre->id) }}" class="btn btn-warning btn-sm">Edit</a>
        <form action="{{ route('genres.destroy', $genre->id) }}" method="POST" style="display: inline-block;">
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
