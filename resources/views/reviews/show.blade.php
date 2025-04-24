@extends('layouts.bootstrap')

@section('content')
<div class="container">
    <h1 class="mb-4">Review Details</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Movie: {{ $review->movie->title }}</h5>
            <p class="card-text"><strong>Reviewer:</strong> {{ $review->reviewer }}</p>
            <p class="card-text"><strong>Rating:</strong> {{ $review->rating }}/10</p>
            <p class="card-text"><strong>Comment:</strong> {{ $review->comment ?? 'No comment provided.' }}</p>
            <p class="card-text"><small class="text-muted">Posted on {{ $review->created_at->format('F j, Y') }}</small></p>
        </div>
    </div>

    <a href="{{ route('reviews.index') }}" class="btn btn-secondary mt-3">Back to Reviews</a>
@endsection
