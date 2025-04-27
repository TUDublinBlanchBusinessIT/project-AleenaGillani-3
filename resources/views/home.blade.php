@extends('layouts.bootstrap')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="height: 70vh;">
    <div class="card p-5" style="background-color: #162447;">
        <h1 class="text-center mb-4" style="color: #ffffff;">Welcome to the Movie Collection!</h1>
        <p class="text-center mb-4" style="color: #cccccc;">Manage and browse movies, genres, reviews, and actors easily.</p>
        <hr style="background-color: #ffffff;">
        <div class="text-center">
            <a href="{{ route('movies.index') }}" class="btn btn-primary">Go to Movies</a>
        </div>
    </div>
</div>
@endsection
