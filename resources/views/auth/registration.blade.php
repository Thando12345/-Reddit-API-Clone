<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100">
<div class="container mt-5">
    <div class="col-md-6 mx-auto">
        <div class="card shadow">
            <div class="card-body">
                <h2 class="text-center mb-4">Register</h2>
                <form method="POST" action="{{ route('registration') }}">
                    @csrf

                    <!-- Input fields for name, email, password, and password confirmation -->
                    <input type="text" name="name" placeholder="Name" class="form-control mb-2">
                    <input type="email" name="email" placeholder="Email" class="form-control mb-2">
                    <input type="password" name="password" placeholder="Password" class="form-control mb-2">
                    <input type="password" name="password_confirmation" placeholder="Confirm Password" class="form-control mb-2">

                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                </form>

                <p class="mt-4 text-center">Already have an account? <a href="{{ route('login') }}" class="text-blue-500">Login</a></p>
            </div>
        </div>
    </div>
</div>
</body>
</html>
