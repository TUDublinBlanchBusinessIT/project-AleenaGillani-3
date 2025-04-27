@extends('layouts.bootstrap')

@section('content')
<div class="container">
    <h1 class="mb-4">Genre Details</h1>

    <div class="card p-4">
        <h3>{{ $genre->name }}</h3>
        <p><strong>Description:</strong> {{ $genre->description ?? '—' }}</p>
        <p><strong>Created:</strong> {{ $genre->created_at->format('d M Y') }}</p>
    </div>

    <a href="{{ route('genres.index') }}" class="btn btn-secondary mt-3">Back to Genres</a>
</div>
@endsection
