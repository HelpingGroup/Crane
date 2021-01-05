<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $post = Post::create([
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'content' => $request->content,
            'publish_at' => $request->publish_at
        ]);
        
        return redirect()->route('posts', ['post' => $post->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.edit', [
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(StorePostRequest $request)
    {
        if ($request->file) {
            $file_name = time() . '_' . $request->file->getClientOriginalName();
            $file_path = $request->file('file')->store('public');
            
            Post::find($request->post_id)->files()->create([
                'name' => $file_name,
                'file_path' => $file_path
            ]);
        }
        
        Post::find($request->post_id)
            ->update([
               'title' => $request->title,
               'content' => $request->content,
               'approved_by' => $request->approved_by,
               'publish_at' => $request->publish_at
            ]);

        return redirect()->route('posts', ['post' => $request->post_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('collaborate');
    }

    /**
     * Remove the files from the post.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroyFiles(Post $post)
    {
        Log::debug('deleting files');
        
        foreach($post->files as $file) {
            Storage::delete($file->file_path);
            Log::debug($file->file_path);
        }
        
        $post->files()->delete();

        return redirect()->route('posts', ['post' => $post->id]);
    }

    /**
     * Approve the post.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function approve(Post $post)
    {
        $post->approved_by = Auth::user()->id;
        $post->save();

        return redirect()->route('posts', ['post' => $post->id]);
    }

    /**
     * Refuse the post.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function refuse(Post $post)
    {
        $post->approved_by = null;
        $post->save();

        return redirect()->route('posts', ['post' => $post->id]);
    }
}
