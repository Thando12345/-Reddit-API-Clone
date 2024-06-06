<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Reddit API Prototype</title>
    <link href="{{ asset('css/tailwind.css') }}" rel="stylesheet">
    <style>
        @keyframes fadeIn {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }

        .fade-in {
            animation: fadeIn 1.5s ease-out;
        }

        .gradient-bg {
            background-image: linear-gradient(120deg, #2980b9, #2c3e50);
        }
    </style>
</head>
<body class="gradient-bg flex items-center justify-center h-screen">
    <div class="text-center">
        <h1 class="text-4xl font-bold mb-4 text-white fade-in">Welcome to My Reddit API Prototype!</h1>
        <br>
        <p class="text-lg mb-8 text-white fade-in">This is a fun little project to showcase a makeshift Reddit API built with Laravel and Tailwind CSS.</p>
        <p class="text-lg text-white fade-in">For more information, visit the <a href="/api-requests" class="underline">API Requests</a> page.</p>
    </div>
</body>
</html>
