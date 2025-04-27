@extends('layouts.bootstrap')

@section('content')
<div class="container">
    <h1 class="mb-4">Review Details</h1>

    <div class="card p-4">
        <h3>Movie: {{ $review->movie->title ?? 'N/A' }}</h3>
        <p><strong>Reviewer:</strong> {{ $review->reviewer }}</p>
        <p><strong>Rating:</strong>
            @for ($i = 0; $i < $review->rating; $i++)
                <span style="color: gold;">★</span>
            @endfor
            @for ($i = $review->rating; $i < 5; $i++)
                <span style="color: grey;">☆</span>
            @endfor
        </p>
        <p><strong>Comment:</strong> {{ $review->comment ?? '—' }}</p>
        <p><strong>Created:</strong> {{ $review->created_at->format('d M Y') }}</p>
    </div>

    <a href="{{ route('reviews.index') }}" class="btn btn-secondary mt-3">Back to Reviews</a>
</div>
@endsection
