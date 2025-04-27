@extends('layouts.bootstrap')

@section('content')
<div class="container">
    <h1 class="mb-4">Review Details</h1>

    <div class="card p-4">
        <h3>Movie: {{ $review->movie->title ?? 'N/A' }}</h3>
        <p><strong>Reviewer:</strong> {{ $review->reviewer }}</p>
        <p><strong>Rating:</strong> {{ $review->rating }}/10</p>
        <p><strong>Comment:</strong> {{ $review->comment ?? '—' }}</p>
        <p><strong>Created:</strong> {{ $review->created_at->format('d M Y') }}</p>
    </div>

    <a href="{{ route('reviews.index') }}" class="btn btn-secondary mt-3">Back to Reviews</a>
</div>
@endsection
