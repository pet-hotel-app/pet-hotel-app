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
    @php
    $isAdmin = request()->is('admin*');
@endphp

<body class="font-sans text-gray-900 antialiased">
    <div
        class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 {{ $isAdmin ? 'bg-slate-900' : 'bg-gray-100' }}">

        <a href="{{ route('home') }}"
            class="absolute top-4 left-4 inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest transition {{ $isAdmin ? 'bg-slate-800 text-white hover:bg-slate-700' : 'bg-white text-gray-700 hover:bg-gray-50' }}">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            {{ __('messages.back_to_home') ?? 'Back to Home' }}
        </a>

        <div class="absolute top-4 right-4">
            <div class="flex items-center space-x-2 rounded-md px-3 py-2 {{ $isAdmin ? 'bg-slate-800' : 'bg-white' }}">
                <a href="{{ route('lang.switch', 'id') }}"
                    class="text-sm font-bold {{ app()->getLocale() == 'id' ? ($isAdmin ? 'text-pink-400' : 'text-pink-500') : ($isAdmin ? 'text-gray-400' : 'text-gray-500') }}">ID</a>
                <span class="{{ $isAdmin ? 'text-slate-600' : 'text-gray-300' }}">|</span>
                <a href="{{ route('lang.switch', 'en') }}"
                    class="text-sm font-bold {{ app()->getLocale() == 'en' ? ($isAdmin ? 'text-pink-400' : 'text-pink-500') : ($isAdmin ? 'text-gray-400' : 'text-gray-500') }}">EN</a>
            </div>
        </div>

        <div>
            <a href="/">
                <x-application-logo
                    class="w-20 h-20 fill-current {{ $isAdmin ? 'text-gray-400' : 'text-gray-500' }}" />
            </a>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 {{ $isAdmin ? 'bg-slate-800' : 'bg-white' }} shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
</body>
</html>
