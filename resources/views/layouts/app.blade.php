<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Pet Hotel</title>
    <link href="/css/app.css" rel="stylesheet">
</head>
<body>
    <div class="container mx-auto py-6">
        <header class="mb-6">
            <h1 class="text-2xl font-bold">Pet Hotel</h1>
            <nav class="mt-2">
                <a href="/owners" class="mr-4">Owners</a>
                <a href="/pets" class="mr-4">Pets</a>
                <a href="/rooms" class="mr-4">Rooms</a>
                <a href="/bookings" class="mr-4">Bookings</a>
                <a href="/invoices" class="mr-4">Invoices</a>
                <a href="/reports/bookings" class="mr-4">Reports</a>
            </nav>
        </header>

        <main>
            @if(session('success'))
                <div class="bg-green-200 p-3 mb-4">{{ session('success') }}</div>
            @endif
            @yield('content')
        </main>
    </div>
    <script src="/js/app.js"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
