@extends('layouts.bootstrap')

@section('content')
<div class="container">
    <h1 class="mt-4">Dashboard</h1>
    <p>Welcome to your Movie Collection dashboard, {{ Auth::user()->name }}!</p>
    <a href="{{ route('movies.index') }}" class="btn btn-primary mt-3">Go to Movies</a>
</div>
@endsection
