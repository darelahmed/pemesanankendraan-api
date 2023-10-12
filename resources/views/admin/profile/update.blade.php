<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Profile</title>
</head>
<body>
    EDIT PROFILE
    <a href="{{ route('profile.page', $profile->id) }}">Back</a>
    <form action="{{ route('profile.post', $profile->id) }}" method="post">
        @csrf
        <input type="text" name="name" value="{{ $profile->name }}" required>
        <input type="email" name="email" value="{{ $profile->email }}" required>
        <input type="password" name="password" placeholder="password" required>
        <button type="submit">Update</button>
    </form>
</body>
</html>