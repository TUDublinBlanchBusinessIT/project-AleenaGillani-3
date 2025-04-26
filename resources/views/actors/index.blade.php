@extends('layouts.bootstrap')

@section('content')
<div class="container">
    <h1 class="mb-4">Actors</h1>

    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('actors.create') }}" class="btn btn-success">Add New Actor</a>
        <a href="{{ route('actors.trash') }}" class="btn btn-secondary">View Trash</a>  {{-- ADD THIS LINE --}}
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Birthdate</th>
                <th>Biography</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($actors as $actor)
            <tr>
                <td>{{ $actor->name }}</td>
                <td>{{ $actor->birth_date ? \Carbon\Carbon::parse($actor->birth_date)->format('d/m/Y') : '-' }}</td>
                <td>{{ $actor->biography ?? '—' }}</td>
                <td>
                    <a href="{{ route('actors.show', $actor->id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('actors.edit', $actor->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('actors.destroy', $actor->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
