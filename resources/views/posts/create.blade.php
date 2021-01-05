@extends('layouts.base')

@section('title', 'Create Post')

@section('content')
<x-nav-bar />

<div class="flex flex-col p-4 mx-auto mt-8 md:w-1/2 lg:w-1/2 xl:1/3">

  <!-- Content -->
  <form id="save-post" action="/posts" method="post" enctype="multipart/form-data">
    @csrf

    <input type="text" name="title" class="w-full text-2xl font-bold border-none appearance-none focus:outline-none" value="" placeholder="Post Title" />

    <div class="flex items-center justify-between mt-2">
      <div class="flex flex-col">
        <input type="datetime" name="publish_at" id="publish_at" placeholder="Date & time" class="border-none appearance-none focus:outline-none" value="{{ date('d-m-y H:i', mktime(13, 0, 0, date('m')  , date('d')+1, date('y'))) }}">
        @error('publish_at')
        <div class="text-sm text-red-600">{{ $message }}</div>
        @enderror
      </div>
    </div>

    <div class="p-4 mt-4 bg-gray-100 rounded shadow">
      <textarea name="content" id="content" class="w-full bg-transparent appearance-none resize-y" rows="6"></textarea>
    </div>

    <!-- File -->
    <div class="p-4 mt-4 bg-gray-100 rounded shadow">
      <input type="file" class="w-full" name="file" id="file">
    </div>
  </form>

  <!-- Actions -->
  <div class="mt-4">
    <h2 class="mb-2 text-2xl font-bold">Actions</h2>

    <div class="flex flex-wrap gap-2">
      <button type="submit" form="save-post" class="px-4 py-2 transition-colors duration-75 ease-linear bg-blue-200 rounded-full cursor-pointer hover:bg-blue-300">
        <i class="mr-1 fal fa-save"></i> Save Post
      </button>

      <a href="{{ route('collaborate') }}" class="px-4 py-2 transition-colors duration-75 ease-linear bg-red-200 rounded-full cursor-pointer hover:bg-red-300"><i class="mr-1 fal fa-trash"></i> Delete Post</a>
    </div>
  </div>
</div>

@endsection