<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Models\Post;

Route::view('/', 'welcome');

Route::redirect('/posts', '/collaborate');

Route::post('/posts', [PostController::class, 'store']);
Route::get('/posts/create', [PostController::class, 'create']);
Route::put('/posts/{post}/approve', [PostController::class, 'approve']);
Route::put('/posts/{post}/refuse', [PostController::class, 'refuse']);
Route::delete('/posts/{post}/files', [PostController::class, 'destroyFiles']);
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts');
Route::put('/posts/{post}', [PostController::class, 'update']);
Route::delete('/posts/{post}', [PostController::class, 'destroy']);

Route::post('/posts/{post}/comments', [CommentController::class, 'store']);
Route::delete('/posts/{post}/comments', [CommentController::class, 'destroy']);

Route::middleware(['auth:sanctum', 'verified'])->get('/collaborate', function () {
    return view('collaborate', [
        'posts' => Post::all()->groupBy(function ($post, $key) {
            return DateTime::createFromFormat('Y-m-d H:i:s', $post->publish_at)->format('F');
        })
    ]);
})->name('collaborate');
