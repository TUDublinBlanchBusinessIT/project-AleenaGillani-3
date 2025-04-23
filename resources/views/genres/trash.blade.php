@extends('layouts.bootstrap')

@section('content')
<div class="container">
    <h1 class="mb-4">Trashed Genres</h1>

    @if ($genres->isEmpty())
        <div class="alert alert-info">No genres in the trash.</div>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Deleted At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($genres as $genre)
                    <tr>
                        <td>{{ $genre->name }}</td>
                        <td>{{ $genre->deleted_at->format('Y-m-d H:i') }}</td>
                        <td>
                            <form action="{{ route('genres.restore', $genre->id) }}" method="POST">
                                @csrf
                                <button class="btn btn-warning btn-sm">Restore</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <a href="{{ route('genres.index') }}" class="btn btn-secondary mt-3">Back to Genres</a>
</div>
@endsection
