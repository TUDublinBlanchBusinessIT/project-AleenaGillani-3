@extends('layouts.bootstrap')

@section('content')
<div class="container">
    <h1 class="mb-4">Actor Details</h1>

    <div class="card p-4">
        <h3>{{ $actor->name }}</h3>
        <p><strong>Birthdate:</strong> {{ $actor->birth_date ? \Carbon\Carbon::parse($actor->birth_date)->format('d/m/Y') : '-' }}</p>
        <p><strong>Biography:</strong> {{ $actor->biography ?? '—' }}</p>
        <p><strong>Created:</strong> {{ $actor->created_at->format('d M Y') }}</p>
    </div>

    <a href="{{ route('actors.index') }}" class="btn btn-secondary mt-3">Back to Actors</a>
</div>
@endsection
