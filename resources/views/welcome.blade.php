<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ __('messages.app_title') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-800 antialiased">

    <nav class="bg-white fixed w-full z-50 top-0 start-0 border-b border-gray-200 shadow-sm">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
                <x-application-logo class="h-10 w-auto" />
                <span class="self-center text-xl font-bold whitespace-nowrap text-gray-900">{{ __('messages.app_name') }}</span>
            </a>
            
            <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse gap-2">

                <!-- Language Switcher -->
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" class="flex items-center justify-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:outline-none">
                        <span>{{ strtoupper(app()->getLocale()) }}</span>
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>

                    <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-24 bg-white rounded-md shadow-lg z-20">
                        <a href="{{ route('lang.switch', 'id') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">ID</a>
                        <a href="{{ route('lang.switch', 'en') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">EN</a>
                    </div>
                </div>
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-white bg-purple-600 hover:bg-purple-700 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-4 py-2 text-center">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="btn-secondary">{{ __('messages.login') }}</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn-gradient">{{ __('messages.register') }}</a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </nav>

    <section class="mt-20 bg-white">
        <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 items-center">
            
            <div class="mr-auto place-self-center lg:col-span-7">
                <h1 class="heading-1 max-w-2xl mb-4 text-gray-900">
                    {{ __('messages.hero_title_1') }} <br>
                    <span class="text-primary">{{ __('messages.hero_title_2') }}</span>
                </h1>
                <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl">
                    {{ __('messages.hero_subtitle') }}
                </p>
                
                <div class="flex flex-wrap gap-3">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-white rounded-lg bg-purple-600 hover:bg-purple-700">
                            {{ __('messages.to_dashboard') }}
                        </a>
                    @else
                        <a href="{{ route('register') }}" class="btn-gradient px-5 py-3 text-base">
                            {{ __('messages.book_now') }}
                        </a>
                        <a href="{{ route('login') }}" class="btn-secondary px-5 py-3 text-base">
                            {{ __('messages.login') }}
                        </a>
                    @endauth
                </div>
            </div>

            <div class="hidden lg:mt-0 lg:col-span-5 lg:flex justify-center">
                <img src="https://images.unsplash.com/photo-1548199973-03cce0bbc87b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                     alt="Happy Pet" 
                     class="rounded-2xl shadow-2xl object-cover h-80 w-full max-w-md transform rotate-2 hover:rotate-0 transition duration-300">
            </div>
        </div>
    </section>

    <section class="bg-gray-50 py-12">
        <div class="px-4 mx-auto max-w-screen-xl">
            <div class="grid space-y-8 md:grid-cols-3 md:gap-8 md:space-y-0">
                
                <div class="card-info">
                    <div class="w-10 h-10 mb-4 rounded-full bg-green-100 text-primary flex items-center justify-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </div>
                    <h3 class="heading-4 mb-2 text-gray-900">{{ __('messages.feature_1_title') }}</h3>
                    <p class="text-gray-500 text-sm">{{ __('messages.feature_1_desc') }}</p>
                </div>

                <div class="card-info">
                    <div class="w-10 h-10 mb-4 rounded-full bg-green-100 text-primary flex items-center justify-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h3 class="heading-4 mb-2 text-gray-900">{{ __('messages.feature_2_title') }}</h3>
                    <p class="text-gray-500 text-sm">{{ __('messages.feature_2_desc') }}</p>
                </div>

                <div class="card-info">
                    <div class="w-10 h-10 mb-4 rounded-full bg-green-100 text-primary flex items-center justify-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    </div>
                    <h3 class="heading-4 mb-2 text-gray-900">{{ __('messages.feature_3_title') }}</h3>
                    <p class="text-gray-500 text-sm">{{ __('messages.feature_3_desc') }}</p>
                </div>

            </div>
        </div>
    </section>

    <section class="bg-white py-8 border-t border-gray-200 mt-auto">
        <div class="max-w-screen-xl mx-auto px-4 text-center">
            <p class="text-gray-500 text-xs mb-3">{{ __('messages.are_you_admin') }}</p>
            <a href="{{ url('/admin/login') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-600 bg-gray-100 rounded-lg hover:bg-gray-200 transition">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                {{ __('messages.admin_login_prompt') }}
            </a>
            <p class="mt-8 text-xs text-gray-400">&copy; {{ date('Y') }} Pet Hotel Application.</p>
        </div>
    </section>

</body>
</html>