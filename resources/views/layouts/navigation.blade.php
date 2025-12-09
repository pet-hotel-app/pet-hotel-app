<nav x-data="{ open: false, notifCount: 0, messageCount: 0 }" x-init="
    // Poll for notification and message counts every 30 seconds
    setInterval(() => {
        fetch('/api/notifications/unread-count')
            .then(res => res.json())
            .then(data => notifCount = data.count);
        fetch('/api/messages/unread-count')
            .then(res => res.json())
            .then(data => messageCount = data.count);
    }, 30000);
    // Initial load
    fetch('/api/notifications/unread-count').then(res => res.json()).then(data => notifCount = data.count);
    fetch('/api/messages/unread-count').then(res => res.json()).then(data => messageCount = data.count);
" class="bg-white/50 backdrop-blur-sm border-b border-green-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    @if(Auth::user()->isAdmin())
                        <!-- Admin Navigation -->
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard') || request()->routeIs('admin.dashboard')">
                            {{ __('navigation.dashboard') }}
                        </x-nav-link>
                        <x-nav-link :href="route('owners.index')" :active="request()->routeIs('owners.*')">
                            {{ __('navigation.owners') }}
                        </x-nav-link>
                        <x-nav-link :href="route('pets.index')" :active="request()->routeIs('pets.*')">
                            {{ __('navigation.pets') }}
                        </x-nav-link>
                        <x-nav-link :href="route('rooms.index')" :active="request()->routeIs('rooms.*')">
                            {{ __('navigation.rooms') }}
                        </x-nav-link>
                        <x-nav-link :href="route('bookings.index')" :active="request()->routeIs('bookings.*')">
                            {{ __('navigation.bookings') }}
                        </x-nav-link>
                        <x-nav-link :href="route('invoices.index')" :active="request()->routeIs('invoices.*')">
                            {{ __('navigation.invoices') }}
                        </x-nav-link>
                        <x-nav-link :href="route('reports.bookings')" :active="request()->routeIs('reports.*')">
                            {{ __('navigation.reports') }}
                        </x-nav-link>
                        <x-nav-link :href="route('messages.index')" :active="request()->routeIs('messages.*')">
                            {{ __('navigation.messages') }}
                        </x-nav-link>
                    @else
                        <!-- Customer Navigation -->
                        <x-nav-link :href="route('customer.dashboard')" :active="request()->routeIs('customer.dashboard')">
                            {{ __('navigation.dashboard') }}
                        </x-nav-link>
                        <x-nav-link :href="route('customer.rooms')" :active="request()->routeIs('customer.rooms') || request()->routeIs('customer.book')">
                            {{ __('navigation.book_room') }}
                        </x-nav-link>
                        <x-nav-link :href="route('customer.pets.index')" :active="request()->routeIs('customer.pets.*')">
                            {{ __('navigation.my_pets') }}
                        </x-nav-link>
                        <x-nav-link :href="route('customer.bookings')" :active="request()->routeIs('customer.bookings')">
                            {{ __('navigation.my_bookings') }}
                        </x-nav-link>
                        <x-nav-link :href="route('customer.invoices.index')" :active="request()->routeIs('customer.invoices.*')">
                            {{ __('navigation.invoices') }}
                        </x-nav-link>
                    @endif
                </div>
            </div>

            <!-- Right Side Of Navbar -->
            <div class="hidden sm:flex sm:items-center sm:ms-6 gap-4">
                <!-- Language Switcher -->
                <div class="flex items-center space-x-2">
                    <a href="{{ route('lang.switch', 'id') }}" class="text-sm font-bold {{ app()->getLocale() == 'id' ? 'text-primary' : 'text-gray-500' }}">ID</a>
                    <span class="text-gray-300">|</span>
                    <a href="{{ route('lang.switch', 'en') }}" class="text-sm font-bold {{ app()->getLocale() == 'en' ? 'text-primary' : 'text-gray-500' }}">EN</a>
                </div>

                <!-- Notification Bell -->
                <a href="@if(Auth::user()->isAdmin()) # @else {{ route('customer.notifications.index') }} @endif" class="relative">
                    <svg class="w-6 h-6 text-gray-700 hover:text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                    </svg>
                    <span x-show="notifCount > 0" x-text="notifCount" class="absolute -top-1 -right-1 bg-secondary text-gray-800 text-xs rounded-full h-5 w-5 flex items-center justify-center font-semibold"></span>
                </a>

                <!-- Messages Icon -->
                <a href="@if(Auth::user()->isAdmin()) {{ route('messages.index') }} @else {{ route('customer.messages.index') }} @endif" class="relative">
                    <svg class="w-6 h-6 text-gray-700 hover:text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"></path>
                    </svg>
                    <span x-show="messageCount > 0" x-text="messageCount" class="absolute -top-1 -right-1 bg-secondary text-gray-800 text-xs rounded-full h-5 w-5 flex items-center justify-center font-semibold"></span>
                </a>

                <!-- Settings Dropdown -->
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-700 bg-transparent hover:text-primary focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        @if(Auth::user()->isCustomer())
                            <x-dropdown-link :href="route('customer.profile')">
                                {{ __('navigation.profile') }}
                            </x-dropdown-link>
                        @else
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('navigation.profile') }}
                            </x-dropdown-link>
                        @endif

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('navigation.logout') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            @if(Auth::user()->isAdmin())
                <!-- Admin Responsive Navigation -->
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard') || request()->routeIs('admin.dashboard')">
                    {{ __('navigation.dashboard') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('owners.index')" :active="request()->routeIs('owners.*')">
                    {{ __('navigation.owners') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('pets.index')" :active="request()->routeIs('pets.*')">
                    {{ __('navigation.pets') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('rooms.index')" :active="request()->routeIs('rooms.*')">
                    {{ __('navigation.rooms') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('bookings.index')" :active="request()->routeIs('bookings.*')">
                    {{ __('navigation.bookings') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('invoices.index')" :active="request()->routeIs('invoices.*')">
                    {{ __('navigation.invoices') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('reports.bookings')" :active="request()->routeIs('reports.*')">
                    {{ __('navigation.reports') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('messages.index')" :active="request()->routeIs('messages.*')">
                    {{ __('navigation.messages') }}
                </x-responsive-nav-link>
            @else
                <!-- Customer Responsive Navigation -->
                <x-responsive-nav-link :href="route('customer.dashboard')" :active="request()->routeIs('customer.dashboard')">
                    {{ __('navigation.dashboard') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('customer.rooms')" :active="request()->routeIs('customer.rooms') || request()->routeIs('customer.book')">
                    {{ __('navigation.book_room') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('customer.pets.index')" :active="request()->routeIs('customer.pets.*')">
                    {{ __('navigation.my_pets') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('customer.bookings')" :active="request()->routeIs('customer.bookings')">
                    {{ __('navigation.my_bookings') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('customer.invoices.index')" :active="request()->routeIs('customer.invoices.*')">
                    {{ __('navigation.invoices') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('customer.notifications.index')" :active="request()->routeIs('customer.notifications.*')">
                    {{ __('navigation.notifications') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('customer.messages.index')" :active="request()->routeIs('customer.messages.*')">
                    {{ __('navigation.messages') }}
                </x-responsive-nav-link>
            @endif
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <!-- Language Switcher -->
            <div class="px-4 py-3">
                <div class="flex items-center justify-center space-x-4">
                    <a href="{{ route('lang.switch', 'id') }}" class="px-3 py-1 rounded-md text-sm font-medium {{ app()->getLocale() == 'id' ? 'bg-blue-500 text-white' : 'text-gray-600 hover:bg-gray-100' }}">
                        ID
                    </a>
                    <a href="{{ route('lang.switch', 'en') }}" class="px-3 py-1 rounded-md text-sm font-medium {{ app()->getLocale() == 'en' ? 'bg-blue-500 text-white' : 'text-gray-600 hover:bg-gray-100' }}">
                        EN
                    </a>
                </div>
            </div>
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                @if(Auth::user()->isCustomer())
                    <x-responsive-nav-link :href="route('customer.profile')">
                        {{ __('navigation.profile') }}
                    </x-responsive-nav-link>
                @else
                    <x-responsive-nav-link :href="route('profile.edit')">
                        {{ __('navigation.profile') }}
                    </x-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('navigation.logout') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
