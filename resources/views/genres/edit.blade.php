@extends('layouts.bootstrap')

@section('content')
<h1>Edit Genre</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('genres.update', $genre->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="name">Genre Name</label>
        <input 
            type="text" 
            name="name" 
            class="form-control @error('name') is-invalid @enderror" 
            value="{{ old('name', $genre->name) }}" 
            required>
    </div>

    <div class="form-group">
        <label for="description">Description:</label>
        <textarea 
            name="description" 
            class="form-control @error('description') is-invalid @enderror"
        >{{ old('description', $genre->description) }}</textarea>
    </div>

    <button type="submit" class="btn btn-success mt-3">Update Genre</button>
</form>
@endsection
