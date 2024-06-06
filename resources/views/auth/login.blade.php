<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100">
<div class="container mt-5">
    <div class="col-md-6 mx-auto">
        <div class="card shadow">
            <div class="card-body">
                <h2 class="text-center mb-4">Login</h2>
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Input fields for email and password -->
                    <input type="email" name="email" placeholder="Email" class="form-control mb-2">
                    <input type="password" name="password" placeholder="Password" class="form-control mb-2">

                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </form>

                <p class="mt-4 text-center">Don't have an account? <a href="{{ route('registration') }}" class="text-blue-500">Register</a></p>
            </div>
        </div>
    </div>
</div>
</body>
</html>
