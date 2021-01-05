<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeleteCommentRequest;
use App\Http\Requests\StoreCommentRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCommentRequest $request)
    {
        $validated = $request->validated();
        
        Comment::create([
            'user_id' => Auth::user()->id,
            'post_id' => $validated['post_id'],
            'comment' => $validated['comment']
        ]);
        
        return redirect()->route('posts', ['post' => $validated['post_id']]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeleteCommentRequest $request)
    {
        $validated = $request->validated();
        
        Comment::destroy($validated['comment_id']);

        return redirect()->route('posts', ['post' => $validated['post_id']]);
    }
}
