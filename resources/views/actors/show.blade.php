@extends('layouts.bootstrap')

@section('content')
<div class="container">
    <h1>{{ $actor->name }}</h1>

    <p><strong>Birthdate:</strong> {{ $actor->birthdate }}</p>

    <a href="{{ route('actors.index') }}" class="btn btn-secondary mt-3">Back to List</a>
</div>
@endsection
