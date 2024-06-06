<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\VoteController;

// View routes
Route::view('/', 'splash');
Route::view('/api-requests', 'api-requests');

// Authentication routes
Route::view('/registration', 'auth.registration')->name('registration'); 
Route::view('/login', 'auth.login')->name('login'); 
Route::post('/registration', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Authenticated routes
Route::middleware('auth:sanctum')->group(function () {
    // Post routes
    Route::get('posts', [PostController::class, 'index']);
    Route::post('posts', [PostController::class, 'store']);
    Route::get('posts/{post}', [PostController::class, 'show']);
    Route::put('posts/{post}', [PostController::class, 'update']);
    Route::delete('posts/{post}', [PostController::class, 'destroy']);
    Route::post('posts/{post}/upvote', [VoteController::class, 'upvotePost']);
    Route::post('posts/{post}/downvote', [VoteController::class, 'downvotePost']);
    
    // Route to query posts by a specific user using their username
    Route::get('posts/user/{username}', [PostController::class, 'postsByUser']);

    // Comment routes
    Route::post('comments', [CommentController::class, 'store']);
    Route::post('comments/{comment}/upvote', [VoteController::class, 'upvoteComment']);
    Route::post('comments/{comment}/downvote', [VoteController::class, 'downvoteComment']);
});
