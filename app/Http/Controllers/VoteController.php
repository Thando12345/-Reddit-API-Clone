<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use App\Models\Vote;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function upvotePost($id)
    {
        $post = Post::findOrFail($id);
        $post->votes()->updateOrCreate(
            ['user_id' => auth()->id()],
            ['upvote' => true]
        );

        return response()->json(['message' => 'Post upvoted']);
    }

    public function downvotePost($id)
    {
        $post = Post::findOrFail($id);
        $post->votes()->updateOrCreate(
            ['user_id' => auth()->id()],
            ['upvote' => false]
        );

        return response()->json(['message' => 'Post downvoted']);
    }

    public function upvoteComment($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->votes()->updateOrCreate(
            ['user_id' => auth()->id()],
            ['upvote' => true]
        );
    
        return response()->json(['message' => 'Comment upvoted']);
    }

    public function downvoteComment($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->votes()->updateOrCreate(
            ['user_id' => auth()->id()],
            ['upvote' => false]
        );

        return response()->json(['message' => 'Comment downvoted']);
    }
}
