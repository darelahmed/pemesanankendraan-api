@extends('admin.dashboard')
@section('container')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
</head>
<body>
    <h1 class="text-muted text-uppercase mt-4 mb-3">Profile</h1>
    <p class="lead">Name : {{ $profile->name }}</p>
    <p class="lead">Gmail : {{ $profile->email }}</p>
    <p class="lead">You're logged in as "{{ $profile->role }}"</p>
    <a href="{{ route('update.page', $profile->id) }}" class="btn btn-outline-warning mt-3">Edit Profile</a>
</body>
</html>
@endsection