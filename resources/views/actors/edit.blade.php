@extends('layouts.bootstrap')

@section('content')
<div class="container">
    <h1>Edit Actor</h1>

    <form method="POST" action="{{ route('actors.update', $actor->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Actor Name:</label>
            <input type="text" name="name" class="form-control" value="{{ $actor->name }}" required>
        </div>

        <div class="form-group">
            <label for="birthdate">Birthdate:</label>
            <input type="date" name="birthdate" class="form-control" value="{{ $actor->birthdate }}" required>
        </div>

        <div class="form-group">
            <label for="biography">Biography:</label>
            <textarea name="biography" id="biography" class="form-control" rows="4">{{ $actor->biography }}</textarea>
        </div>


        <button type="submit" class="btn btn-success mt-3">Update Actor</button>
    </form>
</div>
@endsection
