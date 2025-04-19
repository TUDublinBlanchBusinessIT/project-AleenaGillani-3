@extends('layouts.app')

@section('content')
<div class="container">
  <h1 class="mb-4">Your Profile</h1>

  <form action="{{ route('profile') }}" method="POST">
    @csrf
    <div class="form-group">
      <label for="name">Name</label>
      <input 
        type="text" 
        id="name" 
        name="name" 
        class="form-control" 
        value="{{ old('name', $user->name) }}" 
        required>
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input 
        type="email" 
        id="email" 
        name="email" 
        class="form-control" 
        value="{{ old('email', $user->email) }}" 
        required>
    </div>
    <button type="submit" class="btn btn-primary">Update Profile</button>
  </form>
</div>
@endsection
