@extends('layouts.base')

@section('title', 'Edit Post')

@section('content')
<x-nav-bar />

<form action="/posts/{{ $post->id }}" method="post">
  @csrf
  @method('PUT')

  <input type="hidden" name="post_id" value="{{ $post->id }}">

  <div class="p-4 pt-8">
    <input type="text" name="title" class="w-full text-2xl font-bold border-none appearance-none focus:outline-none" value="{{ $post->title }}" placeholder="Post Title" />

    <div class="flex items-center justify-between mt-2">
      <div>{{ date('d-m-y H:i', strtotime($post->publish_at)) }}</div>
      <div class="p-2 px-4 bg-yellow-100 rounded-full">Awaiting Approval</div>
    </div>

  </div>

  <div class="grid grid-cols-3 gap-4 p-4 xl:mx-auto xl:max-w-6xl">
    <div class="col-span-3 p-4 bg-gray-100 rounded shadow md:col-span-2">
      <textarea class="w-full bg-transparent rounded-md appearance-none resize-y" rows="6">
      {{ $post->content }}
      </textarea>

      @if($post->file)
      <img src="{{ $post->file }}" alt="{{ $post->title }}" class="w-full h-auto">
      @endif
    </div>

    <div class="col-span-3 md:cols-span-1">
      <h2 class="mb-2 text-2xl font-bold">Actions</h2>

      <div class="flex flex-wrap gap-2">
        <button type="submit" class="px-4 py-2 transition-colors duration-75 ease-linear bg-blue-200 rounded-full cursor-pointer hover:bg-blue-300">
          <i class="mr-1 fal fa-save"></i> Save Changes
        </button>

        <div class="px-4 py-2 transition-colors duration-75 ease-linear bg-pink-200 rounded-full cursor-pointer hover:bg-pink-300">
          <i class="mr-1 fal fa-question"></i> Request Approval
        </div>

        <div class="px-4 py-2 transition-colors duration-75 ease-linear bg-green-200 rounded-full cursor-pointer hover:bg-green-300">
          <i class="mr-1 far fa-check"></i> Approve Post
        </div>

        <div class="px-4 py-2 transition-colors duration-75 ease-linear bg-yellow-100 rounded-full cursor-pointer hover:bg-yellow-200">
          <i class="mr-1 fal fa-hand-paper"></i> Remove Approval
        </div>

        <div class="px-4 py-2 transition-colors duration-75 ease-linear bg-red-200 rounded-full cursor-pointer hover:bg-red-300">
          <i class="mr-1 fal fa-trash"></i> Delete Post
        </div>

        <div class="px-4 py-2 transition-colors duration-75 ease-linear bg-purple-200 rounded-full cursor-pointer hover:bg-purple-300">
          <i class="mr-1 fal fa-share-all"></i> Share Now
        </div>
      </div>
    </div>
</form>

<div class="col-span-3 md:col-span-1">
  <h2 class="mb-2 text-2xl font-bold">Comments</h2>

  <div class="flex flex-col gap-4">
    <form action="/posts/{{ $post->id }}/comments" method="post" class="flex gap-4 py-4">
      @csrf
      <input type="hidden" name="post_id" value="{{ $post->id }}">
      <input type="text" name="comment" id="comment" class="flex-grow p-2 border rounded">
      <button type="submit" class="flex-none">Send</button>
    </form>

    @foreach($post->comments as $comment)
    <div class="flex gap-4">
      <img src="/test-headshot.png" alt="Name here" class="w-12 h-12 rounded-full">
      <div class="flex items-center flex-grow gap-4">
        <div class="flex flex-col flex-grow">
          <div class="flex-grow p-4 border rounded">
            {{ $comment->comment }}
          </div>

          <div class="flex items-center justify-end gap-2 mt-2">
            @if(Auth::user()->id === $comment->user_id)
            <!-- Edit -->
            <!-- TODO: Toggle comment to be editable, using Vue. Change pencil to save & discard changes icons -->
            <i class="fal fa-pencil"></i>

            <!-- Delete -->
            <form action="/posts/{{ $post->id }}/comments" method="post">
              @csrf
              @method('DELETE')

              <input type="hidden" name="post_id" value="{{ $post->id }}">
              <input type="hidden" name="comment_id" value="{{ $comment->id }}">

              <button type="submit" class="appearance-none">
                <i class="fal fa-trash"></i>
              </button>
            </form>
            @endif

            <!-- Date Time -->
            <div class="text-sm italic">{{ date('H:i', strtotime($comment->created_at)) }}</div>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection