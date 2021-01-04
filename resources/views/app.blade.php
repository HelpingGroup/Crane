<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Crane') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!-- Scripts -->
    @routes
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/9971083e06.js" crossorigin="anonymous"></script>
</head>

<body class="font-sans antialiased">
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
        <div class="col-span-2 p-4 bg-gray-100 shadow md:col-span-1">
            <h2 class="mb-2 text-2xl font-bold">Calendar</h2>

            Calendar Here
        </div>

        <!-- Articles -->
        <div class="col-span-2 md:col-span-1">

            <h2 class="mb-2 text-2xl font-bold">Upcoming posts</h2>

            <div class="flex flex-col space-y-4">
                @for ($i = 0; $i < 5; $i++) <div class="flex justify-between gap-4 p-4 bg-gray-100 shadow">
                    <!-- Published Status & Title -->
                    <div class="flex items-center gap-4">
                        <i class="text-green-500 fad fa-circle"></i>
                        <div class="font-semibold">Post Title</div>
                    </div>

                    <div class="flex">
                        <!-- Date/Time to Publish -->

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
                        </div>
                    </div>
            </div>
            @endfor
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