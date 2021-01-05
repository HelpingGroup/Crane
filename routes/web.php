<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Models\Post;

Route::view('/', 'welcome');

Route::get('/posts', function() { return redirect('/collaborate'); });
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
    return view('app', [
        'posts' => Post::all()->sortBy('publish_at')
    ]);
})->name('collaborate');
