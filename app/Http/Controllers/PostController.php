<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\File;
use App\Models\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;

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
        Post::create($request);
        
        return redirect()->route('collaborate');
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
            $file_path = $request->file('file')->storeAs('uploads', $file_name, 'public');
            
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

        return redirect()->route('posts', ['post' => $request['id']]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // TODO
    }
}
