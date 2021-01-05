<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Crane') }}</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="https://kit.fontawesome.com/9971083e06.js" crossorigin="anonymous"></script>
</head>

<body class="font-sans antialiased text-gray-900">
    <div class="flex items-center justify-between h-16 px-8 shadow-lg w-100">
        <h1 class="text-2xl font-bold">Crane</h1>

        <div class="flex space-x-4">
            <a class="text-gray-900" href="#">Collaborate</a>
            <a class="text-gray-400 cursor-not-allowed" href="#">Metrics</a>
            <a class="text-gray-400 cursor-not-allowed" href="#">Super Secret</a>
        </div>
    </div>

    <div class="grid grid-cols-2 gap-4 p-4 mt-8 xl:mx-auto xl:max-w-6xl">
        <!-- Calendar -->
        <div class="h-64 col-span-2 p-4 bg-gray-100 shadow md:col-span-1">
            <h2 class="mb-2 text-2xl font-bold">Calendar</h2>

            The calendar will go here.
        </div>

        <!-- Articles -->
        <div class="col-span-2 md:col-span-1">

            <div class="flex items-center justify-between mb-2">
                <h2 class="text-2xl font-bold">Posts</h2>
                <a href="/posts/create">Create Post</a>
            </div>

            <div class="flex flex-col space-y-4">
                @foreach ($posts as $post)
                <div>
                    <div class="mb-1 text-sm font-light">{{ date('d-m-Y', strtotime($post->publish_at)) }}</div>
                    <div class="flex items-center gap-4">
                        <div class="flex-none text-sm italic">{{ date('H:i', strtotime($post->publish_at)) }}</div>

                        <a href="/posts/{{ $post->id }}" class="flex justify-between flex-grow gap-4 p-4 transition-all duration-100 ease-in-out transform bg-gray-100 shadow cursor-pointer hover:-translate-y-1 hover:shadow-lg">
                            <!-- Published Status & Title -->
                            <div class="flex items-center gap-4">
                                <i class="{{ $post->approved_by ? 'text-green-500 fad fa-circle' : 'text-gray-500 far fa-circle' }}"></i>
                                <div class="font-semibold">{{ $post->title }}</div>
                            </div>

                            <div class="flex">
                                <!-- Comments -->
                                <!-- <span class="relative flex w-3 h-3">
                                    <span class="absolute inline-flex w-full h-full bg-purple-400 rounded-full opacity-75 animate-ping"></span>
                                    <span class="relative inline-flex w-3 h-3 bg-purple-500 rounded-full"></span>
                                </span> -->

                                <!-- Platforms -->
                                <div class="flex items-center gap-4">
                                    <i class="fab fa-twitter"></i>
                                    <i class="fab fa-facebook"></i>
                                    <i class="fab fa-instagram"></i>
                                    <i class="fab fa-linkedin-in"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                @if($loop->index >= 4)
                @break
                @endif
                @endforeach
            </div>

        </div>
    </div>

    <!-- 
        <form action="/logout" method="post">
        @csrf
            <button type="submit">Logout</button>
        </form>
        -->
</body>

</html>