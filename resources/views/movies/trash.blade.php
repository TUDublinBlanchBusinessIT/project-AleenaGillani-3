@extends('layouts.bootstrap')

@section('content')
<div class="container">
    <h1 class="mb-4">Trashed Movies</h1>

    @if ($movies->isEmpty())
        <div class="alert alert-info">No movies in the trash.</div>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Deleted At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($movies as $movie)
                    <tr>
                        <td>{{ $movie->title }}</td>
                        <td>{{ $movie->deleted_at->format('Y-m-d H:i') }}</td>
                        <td>
                            <form action="{{ route('movies.restore', $movie->id) }}" method="POST">
                                @csrf
                                <button class="btn btn-warning btn-sm">Restore</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <a href="{{ route('movies.index') }}" class="btn btn-secondary mt-3">Back to Movies</a>
</div>
@endsection
