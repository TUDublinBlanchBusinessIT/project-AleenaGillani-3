@extends('layouts.bootstrap')

@section('content')
<div class="container">
    <h1>Add New Actor</h1>

    <form method="POST" action="{{ route('actors.store') }}">
        @csrf
        <div class="form-group">
            <label for="name">Actor Name:</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="birthdate">Birthdate:</label>
            <input type="date" name="birth_date" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="biography">Biography:</label>
            <textarea name="biography" id="biography" class="form-control" rows="4">{{ old('biography') }}</textarea>
        </div>


        <button type="submit" class="btn btn-primary mt-3">Add Actor</button>
    </form>
</div>
@endsection
