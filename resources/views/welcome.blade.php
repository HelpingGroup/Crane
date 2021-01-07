<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Crane</title>

    <x-meta-tags />
</head>

<body class="antialiased">
    <div class="relative flex justify-center min-h-screen bg-gray-100 items-top dark:bg-gray-900 sm:items-center sm:pt-0">
        @if (Route::has('login'))
        <div class="fixed top-0 right-0 hidden px-6 py-4 sm:block">
            @auth
            <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
            @else
            <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>
            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
            @endauth
        </div>
        @endif

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col justify-center pt-8 text-center sm:justify-start sm:pt-0">
                <h1 class="text-5xl font-black">Hello, world! <i class="ml-1 fal fa-globe-asia"></i></h1>
                <h1 class="mb-2 text-3xl font-black">Welcome to Crane.</h1>

                <div class="flex gap-4 mx-auto mt-8">
                    <a href="{{ route('login') }}" class="flex items-center justify-center p-4 font-semibold transition-all duration-75 ease-in-out bg-blue-300 rounded-lg shadow w-28 align-center hover:bg-blue-600 hover:text-white hover:shadow-md">
                        Login
                    </a>

                    <a href="{{ route('register') }}" class="flex items-center justify-center p-4 font-light transition-all duration-75 ease-in-out border rounded-lg shadow w-28 align-center hover:bg-blue-600 hover:text-white hover:shadow-md">
                        Register
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>