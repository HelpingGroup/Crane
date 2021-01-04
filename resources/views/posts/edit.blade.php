@extends('layouts.base')

@section('title', 'Edit Post')

@section('content')
<div class="flex items-center justify-between h-16 px-8 shadow-lg w-100">
  <a href="{{ route('dashboard') }}">
    <h1 class="text-2xl font-bold">Crane</h1>
  </a>

  <div class="flex space-x-4">
    <a class="text-gray-900" href="#">Collaborate</a>
    <a class="text-gray-400 cursor-not-allowed" href="#">Metrics</a>
    <a class="text-gray-400 cursor-not-allowed" href="#">Super Secret</a>
  </div>
</div>

<div class="grid grid-cols-3 gap-4 p-4 mt-8 xl:mx-auto xl:max-w-6xl">
  <!-- Calendar -->
  <div class="h-64 col-span-3 p-4 bg-gray-100 shadow md:col-span-2">
    <h2 class="mb-2 text-2xl font-bold">Calendar</h2>

    {{ $post->comments }}

  </div>

  <div class="col-span-3 p-4 bg-gray-100 shadow md:col-span-1">
    <h2 class="mb-2 text-2xl font-bold">Comments</h2>

  </div>
</div>
@endsection