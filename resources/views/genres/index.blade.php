@extends('layouts.bootstrap')

@section('content')
<h1>Genres</h1>

<a href="{{ route('genres.create') }}" class="btn btn-success mb-3">Add New Genre</a>
<a href="{{ route('genres.trash') }}" class="btn btn-secondary mb-3 ml-2">View Trash</a>

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

        <form id="delete-form-{{ $genre->id }}" action="{{ route('genres.destroy', $genre->id) }}" method="POST" style="display: inline-block;">
          @csrf
          @method('DELETE')
          <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $genre->id }})">Delete</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
