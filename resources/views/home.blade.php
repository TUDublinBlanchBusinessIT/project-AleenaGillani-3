@extends('layouts.app')

@section('content')
<div class="jumbotron">
  <h1 class="display-4">Welcome to the Movie Collection!</h1>
  <p class="lead">Manage and browse movies and genres conveniently.</p>
  <hr class="my-4">
  <a class="btn btn-primary btn-lg" href="{{ route('movies.index') }}" role="button">Go to Movies</a>
</div>
@endsection
