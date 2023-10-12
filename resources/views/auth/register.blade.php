@if (session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="d-flex justify-content-center">
        <form action="{{ route('register.post') }}" method="POST">
            @csrf
            <h1 class="text-muted text-uppercase mt-5 mb-3">Register Admin</h1>
            <label for="name" class="lead">Name</label>
            <input type="text" name="name" id="name" class="form-control d-flex p-2">
            <br>
            <label for="email" class="lead">Email</label>
            <input type="email" name="email" id="email" class="form-control d-flex p-2">
            <br>
            <label for="password" class="lead">Password</label>
            <input type="password" name="password" id="password" class="form-control d-flex p-2">
            <br>
            <label for="role" class="lead">Role</label>
            <select name="role" id="role" class="form-select form-select-lg mb-3"
                aria-label=".form-select-lg example">
                <option value="admin">Admin</option>
                <option value="user" disabled>User</option>
            </select>
            <br>
            <button type="submit" class="btn btn-outline-success">Register</button>
            <a href="{{ route('login.page') }}" class="btn btn-outline-primary">Login</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>
