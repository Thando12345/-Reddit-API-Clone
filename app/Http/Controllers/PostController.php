<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    public function index()
    {
        return Post::with('comments')->paginate(10);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $post = Auth::user()->posts()->create($validatedData);

        return response()->json($post, 201);
    }

    public function show($postId)
    {
        $post = Post::find($postId);
        
        if (!$post) {
            return response()->json(['error' => 'Post not found'], 404);
        }
    
        $post->load(['comments' => function ($query) {
            $query->orderBy('upvotes', 'desc');
        }]);
    
        return response()->json($post, 200);
    }
   
    public function update(Request $request, $postId)
    {
        $post = Post::find($postId);

        if (!$post) {
            return response()->json(['error' => 'Post not found'], 404);
        }

        if (Gate::denies('update-post', $post)) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $post->update($validatedData);

        return response()->json($post, 200);
    }
    public function destroy($postId)
    {
        $post = Post::find($postId);

        if (!$post) {
            return response()->json(['error' => 'Post not found'], 404);
        }

        if (Gate::denies('delete-post', $post)) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $post->delete();

        return response()->json(null, 204);
    }
    
    public function upvote($postId)
    {
        $post = Post::find($postId);

        if (!$post) {
            return response()->json(['error' => 'Post not found'], 404);
        }

        $post->increment('upvotes');

        return response()->json($post, 200);
    }


    public function downvote($postId)
    {
        $post = Post::find($postId);

        if (!$post) {
            return response()->json(['error' => 'Post not found'], 404);
        }

        $post->increment('downvotes');

        return response()->json($post, 200);
    }


    public function postsByUser($username)
{
    $user = User::firstWhere('username', $username);
    
    if (!$user) {
        return response()->json(['error' => 'User not found'], 404);
    }

    $posts = $user->posts()->with('comments')->paginate(10);

    return response()->json($posts, 200);
}

}
