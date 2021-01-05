@extends('layouts.base')

@section('title', 'Edit Post')

@section('content')
<x-nav-bar />

<div class="grid grid-cols-3 gap-8 p-4 mt-8 md:grid-cols-2 lg:grid-cols-3 lg:mx-auto xl:max-w-6xl">

  <!-- Content & Actions -->
  <div class="col-span-3 md:col-span-1 lg:col-span-2">
    <!-- Content -->
    <form id="update-post" action="/posts/{{ $post->id }}" method="post" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <input type="hidden" name="post_id" value="{{ $post->id }}">

      <input type="text" name="title" class="w-full text-2xl font-bold border-none appearance-none focus:outline-none" value="{{ $post->title }}" placeholder="Post Title" />

      <div class="flex items-center justify-between mt-2">
        <div class="flex flex-col">
          <input type="datetime" name="publish_at" id="publish_at" class="border-none appearance-none focus:outline-none" value="{{ date('d-m-y H:i', strtotime($post->publish_at)) }}">
          @error('publish_at')
          <div class="text-sm text-red-600">{{ $message }}</div>
          @enderror
        </div>
        @if($post->isApproved())
        <div class="p-2 px-4 bg-green-100 rounded-full">Approved</div>
        @else
        <div class="p-2 px-4 bg-yellow-100 rounded-full">Awaiting Approval</div>
        @endif
      </div>

      <div class="p-4 mt-4 bg-gray-100 rounded shadow">
        <textarea name="content" id="content" class="w-full bg-transparent appearance-none resize-y" rows="6">{{ $post->content }}</textarea>
      </div>

      <!-- File -->
      @if(count($post->files) >= 1)
      <div class="mt-4">
        @foreach($post->files as $file)
        <img src="{{ Storage::url($file->file_path) }}" alt="{{ $post->title }}" class="w-auto h-48 p-4 bg-gray-100 rounded shadow max-h-48">
        @endforeach
      </div>
      @else
      <div class="p-4 mt-4 bg-gray-100 rounded shadow">
        <input type="file" class="w-full" name="file" id="file">
      </div>
      @endif
    </form>

    @if(count($post->files) >= 1)
    <form id="delete-files" action="/posts/{{ $post->id }}/files" class="mt-2 text-right" method="post">
      @csrf
      @method('DELETE')
      <button type="submit" form="delete-files" class="appearance-none">
        <i class="fal fa-trash"></i> Remove image
      </button>
    </form>
    @endif

    <!-- Actions -->
    <div class="mt-4">
      <h2 class="mb-2 text-2xl font-bold">Actions</h2>

      <div class="flex flex-wrap gap-2">
        <button type="submit" form="update-post" class="px-4 py-2 transition-colors duration-75 ease-linear bg-blue-200 rounded-full cursor-pointer hover:bg-blue-300">
          <i class="mr-1 fal fa-save"></i> Save Changes
        </button>

        @if($post->isApproved())
        <form id="refuse-post" action="/posts/{{ $post->id }}/refuse" method="post" class="px-4 py-2 transition-colors duration-75 ease-linear bg-yellow-100 rounded-full cursor-pointer hover:bg-yellow-200">
          @csrf
          @method('PUT')
          <button type="submit" for="refuse-post"><i class="mr-1 fal fa-hand-paper"></i> Remove Approval</button>
        </form>
        @else
        <form id="approve-post" action="/posts/{{ $post->id }}/approve" method="post" class="px-4 py-2 transition-colors duration-75 ease-linear bg-green-200 rounded-full cursor-pointer hover:bg-green-300">
          @csrf
          @method('PUT')
          <button type="submit" for="approve-post"><i class="mr-1 far fa-check"></i> Approve Post</button>
        </form>
        @endif

        <div x-data="{ clicked: false }" class="px-4 py-2 transition-colors duration-75 ease-linear bg-red-200 rounded-full cursor-pointer hover:bg-red-300">
          <div x-show="!clicked" @click="clicked = true">
            <i class="mr-1 fal fa-trash"></i> Delete Post
          </div>
          <div x-show="clicked">
            <form id="delete-post" action="/posts/{{ $post->id }}" method="post">
              @csrf
              @method('DELETE')
              <button type="submit" form="delete-post"><i x-show="!clicked" class="mr-1 fal fa-trash"></i> Are you sure?</button>
            </form>
          </div>
        </div>

        <div class="px-4 py-2 transition-colors duration-75 ease-linear bg-gray-200 rounded-full cursor-pointer hover:bg-gray-300">
          <i class="mr-1 fal fa-question"></i> Request Approval
        </div>

        <div class="px-4 py-2 transition-colors duration-75 ease-linear bg-gray-200 rounded-full cursor-pointer hover:bg-gray-300">
          <i class="mr-1 fal fa-share-all"></i> Share Now
        </div>
      </div>
    </div>
  </div>

  <!-- Comments -->
  <div class="col-span-3 md:col-span-1 lg:col-span-1">
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
        @if ($comment->user_id === Auth::user()->id)
        <img src="/test-1.jpg" alt="Name here" class="w-12 h-12 rounded-full">
        @endif
        <div class="flex items-center flex-grow gap-4">
          <div class="flex flex-col flex-grow">
            <div class="flex-grow p-4 border rounded">
              {{ $comment->comment }}
            </div>

            <div class="flex items-center @if ($comment->user_id === Auth::user()->id) justify-end @endif gap-2 mt-2">
              @if(Auth::user()->id === $comment->user_id)
              <i class="fal fa-pencil"></i>

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

              <div class="text-sm italic">{{ date('H:i', strtotime($comment->created_at)) }}</div>
            </div>
          </div>
        </div>
        @if ($comment->user_id !== Auth::user()->id)
        <img src="/test-2.jpg" alt="Name here" class="w-12 h-12 rounded-full">
        @endif
      </div>
      @endforeach
    </div>
  </div>

</div>
@endsection