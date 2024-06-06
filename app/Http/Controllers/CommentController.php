<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Vinkla\Hashids\Facades\Hashids;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'post_id' => 'required|exists:posts,id',
            'content' => 'required',
        ]);

        $comment = Auth::user()->comments()->create($validatedData);

        return response()->json($comment, 201);
    }

    public function upvote($id)
{
    try {
        // Decode the comment ID
        $commentId = Hashids::decode($id)[0];
    
        // Find the comment by its decoded ID
        $comment = Comment::find($commentId);
    
        if (!$comment) {
            return response()->json(['error' => 'Comment not found'], 404);
        }
    
        // Increment the upvotes for the comment
        $comment->increment('upvotes');
    
        // Return a success response with a 200 status code
        return response()->json($comment, 200);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Failed to upvote comment: ' . $e->getMessage()], 500);
    }
}

    public function downvote($id)
    {
        try {
            // Decode the comment ID
            $commentId = Hashids::decode($id)[0]; 
    
            // Find the comment by its decoded ID
            $comment = Comment::find($commentId);
    
            if (!$comment) {
                return response()->json(['error' => 'Comment not found'], 404);
            }
    
            // Increment the downvotes for the comment
            $comment->increment('downvotes');
    
            // Return a success response with a 200 status code
            return response()->json($comment, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to downvote comment: ' . $e->getMessage()], 500);
        }
    }
}
