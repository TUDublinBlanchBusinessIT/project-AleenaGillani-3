<!-- resources/views/genres/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Add New Genre</h1>

    <!-- Display Validation Errors -->
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
                class="form-control" 
                value="{{ old('name') }}" 
                required>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea 
                name="description" 
                id="description" 
                class="form-control"
                >{{ old('description') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Add Genre</button>
    </form>
</div>
@endsection
