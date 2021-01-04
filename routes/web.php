<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;
use App\Models\Post;

Route::view('/', 'welcome');

Route::get('/posts/{post}', [PostController::class, 'show']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('app', [
        'posts' => Post::all()
    ]);
})->name('dashboard');
