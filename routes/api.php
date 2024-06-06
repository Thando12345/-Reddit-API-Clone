<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\VoteController;

// Authentication routes
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('logout', [AuthController::class, 'logout']);

// Authenticated routes
Route::middleware('auth:sanctum')->group(function () {
    // User route to retrieve authenticated user's information
    Route::get('user', function (Request $request) {
        return $request->user();
    });

    // Post routes
    Route::apiResource('posts', PostController::class)->except(['create', 'edit']);
    
    
    // Comment routes
    Route::apiResource('comments', CommentController::class)->only(['store']);

    // Vote routes
    Route::post('posts/{post}/upvote', [PostController::class, 'upvote']);
    Route::post('posts/{post}/downvote', [PostController::class, 'downvote']);
    Route::post('comments/{comment}/upvote', [VoteController::class, 'upvoteComment']);
    Route::post('comments/{comment}/downvote', [VoteController::class, 'downvoteComment']);
});
