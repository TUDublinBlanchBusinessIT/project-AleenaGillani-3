@extends('layouts.bootstrap')

@section('content')
<div class="container">
    <h1 class="mb-4">Trashed Actors</h1>

    @if ($actors->isEmpty())
        <div class="alert alert-info">No deleted actors found.</div>
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
                @foreach ($actors as $actor)
                <tr>
                    <td>{{ $actor->name }}</td>
                    <td>{{ $actor->deleted_at->format('d/m/Y H:i') }}</td>
                    <td>
                        <form action="{{ route('actors.restore', $actor->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-warning btn-sm">Restore</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <a href="{{ route('actors.index') }}" class="btn btn-secondary mt-3">Back to Actors</a>
</div>
@endsection
