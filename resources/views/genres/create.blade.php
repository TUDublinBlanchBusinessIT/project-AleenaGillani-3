@extends('layouts.bootstrap')

@section('content')
<div class="container">
    <h1 class="mb-4">Add New Genre</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('genres.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Genre Name:</label>
            <input 
                type="text" 
                name="name" 
                id="name" 
                class="form-control @error('name') is-invalid @enderror" 
                value="{{ old('name') }}" 
                required>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea 
                name="description" 
                id="description" 
                class="form-control @error('description') is-invalid @enderror"
            >{{ old('description') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Add Genre</button>
    </form>
</div>
@endsection
