<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
</head>
<body>
    INI PROFILE ADMIN
    <a href="{{ route('dashboard.page') }}">Back</a>
    <p>{{ $profile->name }}</p>
    <p>{{ $profile->email }}</p>
    <p>masuk sebagai "{{ $profile->role }}"</p>
    <a href="{{ route('update.page', $profile->id) }}">Edit Profile</a>
</body>
</html>