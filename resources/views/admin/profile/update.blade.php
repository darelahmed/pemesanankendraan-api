@extends('admin.dashboard')
@section('container')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Profile</title>
</head>
<body>
    <h1 class="text-muted text-uppercase mt-4 mb-3">Edit Profile</h1>
    <form action="{{ route('profile.post', $profile->id) }}" method="post">
        @csrf
        <input type="text" class="form-control d-flex p-2 mb-3" name="name" value="{{ $profile->name }}" required>
        <input type="email" class="form-control d-flex p-2 mb-3" name="email" value="{{ $profile->email }}" required>
        <input type="password" class="form-control d-flex p-2 mb-3" name="password" placeholder="password" required>
        <button type="submit" class="btn btn-outline-danger">Update</button>
    </form>
</body>
</html>
@endsection