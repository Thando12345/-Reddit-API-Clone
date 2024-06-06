<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API Requests - Reddit API Prototype</title>
    <link href="{{ asset('css/tailwind.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg p-6">
        <h1 class="text-3xl font-bold mb-4">API Requests</h1>
        <p class="text-lg mb-4">Below are the available API endpoints for this Reddit API prototype:</p>
        <ul class="list-disc pl-5">
            <!-- Replace the placeholders with your actual API endpoints -->
            <li class="mb-2"><code class="text-blue-500">POST /register</code> - Register a new user</li>
            <li class="mb-2"><code class="text-blue-500">POST /login</code> - Login a user</li>
            <li class="mb-2"><code class="text-blue-500">POST /logout</code> - Logout a user</li>
            <li class="mb-2"><code class="text-blue-500">GET /posts</code> - List all posts</li>
            <li class="mb-2"><code class="text-blue-500">POST /posts</code> - Create a new post</li>
            <li class="mb-2"><code class="text-blue-500">GET /posts/{id}</code> - View a post</li>
            <li class="mb-2"><code class="text-blue-500">PUT /posts/{id}</code> - Update a post</li>
            <li class="mb-2"><code class="text-blue-500">DELETE /posts/{id}</code> - Delete a post</li>
            <li class="mb-2"><code class="text-blue-500">POST /posts/{id}/upvote</code> - Upvote a post</li>
            <li class="mb-2"><code class="text-blue-500">POST /posts/{id}/downvote</code> - Downvote a post</li>
            <li class="mb-2"><code class="text-blue-500">POST /comments</code> - Create a comment</li>
            <li class="mb-2"><code class="text-blue-500">POST /comments/{id}/upvote</code> - Upvote a comment</li>
            <li class="mb-2"><code class="text-blue-500">POST /comments/{id}/downvote</code> - Downvote a comment</li>
        </ul>
    </div>

    <!-- JavaScript to retrieve CSRF token and make fetch requests -->
    <script>
        const fetchData = async (url, method, data) => {
            try {
                const csrfToken = await getCsrfToken();
                const response = await fetch(url, {
                    method: method,
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify(data)
                });
                const responseData = await response.json();
                console.log(responseData);
            } catch (error) {
                console.error('Error:', error);
            }
        };

        const getCsrfToken = async () => {
            try {
                const response = await fetch('/');
                const html = await response.text();
                const parser = new DOMParser();
                const doc = parser.parseFromString(html, 'text/html');
                const csrfToken = doc.querySelector('meta[name="csrf-token"]').getAttribute('content');
                console.log('CSRF Token:', csrfToken);
                return csrfToken;
            } catch (error) {
                console.error('Error:', error);
            }
        };

        // Example usage:
        // fetchData('/register', 'POST', { name: 'John Doe', email: 'john@example.com', password: 'password' });
    </script>
</body>
</html>
