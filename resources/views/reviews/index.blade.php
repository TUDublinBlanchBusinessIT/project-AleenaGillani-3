@extends('layouts.bootstrap')

@section('content')
<div class="container">
    <h1 class="mb-4">Reviews</h1>

    <a href="{{ route('reviews.create') }}" class="btn btn-success mb-3">Add New Review</a>

    @if ($reviews->isEmpty())
        <div class="alert alert-info">No reviews available.</div>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Movie</th>
                    <th>Reviewer</th>
                    <th>Rating</th>
                    <th>Comment</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reviews as $review)
                    <tr>
                        <td>{{ $review->movie->title ?? 'N/A' }}</td>
                        <td>{{ $review->reviewer }}</td>
                        <td>{{ $review->rating ?? 'N/A' }}/10</td>
                        <td>{{ $review->comment ?? '-' }}</td>
                        <td>
                            <a href="{{ route('reviews.show', $review->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('reviews.edit', $review->id) }}" class="btn btn-warning btn-sm">Edit</a>

                            <form id="delete-form-{{ $review->id }}" action="{{ route('reviews.destroy', $review->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $review->id }})">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
