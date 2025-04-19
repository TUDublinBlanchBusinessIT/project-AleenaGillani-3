@extends('layouts.bootstrap')

@section('content')
<h1>Genre Details</h1>

<div class="card">
    <div class="card-body">
        <h4 class="card-title">{{ $genre->name }}</h4>
        <p class="card-text"><strong>Created:</strong> {{ $genre->created_at->format('d M Y') }}</p>
    </div>
</div>

<a href="{{ route('genres.index') }}" class="btn btn-secondary mt-3">Back to Genres</a>
@endsection
