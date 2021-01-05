<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Crane - @yield('title')</title>

    <x-meta-tags />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>

    @stack('header')
</head>

<body>
    <div class="font-sans antialiased text-gray-900">
        @yield('content')
    </div>

    @stack('scripts')
</body>

</html>