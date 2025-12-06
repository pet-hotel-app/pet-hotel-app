<x-auth-layout>
    <div class="min-h-screen flex gradient-bg">
        <!-- Back to Home Button -->
        <div class="fixed top-6 left-6 z-10">
            <a href="{{ url('/') }}"
               class="inline-flex items-center bg-white text-gray-800 px-4 py-2 rounded-full shadow-lg hover:shadow-xl transition-shadow font-semibold text-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                {{ __('messages.back_to_home') }}
            </a>
        </div>
        <!-- Left Panel - Pet Image & Welcome -->
        <div class="hidden lg:flex lg:w-1/2 items-center justify-center p-12">
            <div class="text-center max-w-sm">
                <!-- Pet Image -->
                <div class="mb-8 flex justify-center">
                    <img src="https://images.unsplash.com/photo-1568572933382-74d440642117?w=400&h=400&fit=crop" 
                         alt="Border Collie" 
                         class="w-80 h-80 rounded-3xl object-cover shadow-2xl">
                </div>
                
                <!-- Welcome Text -->
                <h1 class="text-4xl font-bold text-gray-800 mb-3">
                    {{ __('messages.login_welcome') }}
                </h1>
                
                <!-- Subtitle -->
                <p class="text-gray-600 text-lg">
                    {{ __('messages.login_subtitle') }}
                </p>
            </div>
        </div>

        <!-- Right Panel - Login Form -->
        <div class="w-full lg:w-1/2 flex items-center justify-center p-8 bg-white">
            <div class="w-full max-w-md">
                <!-- Gradient Icon -->
                <div class="flex justify-center mb-6">
                    <div class="w-16 h-16 rounded-2xl flex items-center justify-center shadow-lg"
                         style="background: linear-gradient(135deg, #FFB6C9 0%, #FFE489 100%);">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>

                <!-- Title -->
                <h2 class="text-3xl font-bold text-center text-gray-800 mb-2">
                    {{ __('messages.app_name') }}
                </h2>
                
                <!-- Subtitle -->
                <p class="text-center text-gray-500 text-base mb-8">
                    {{ __('messages.login_title') }}
                </p>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <!-- Form -->
                <form method="POST" action="{{ $isAdmin ? route('admin.login') : route('customer.login') }}">
                    @csrf

                    <!-- Email Address -->
                    <div class="mb-5">
                        <label for="email" class="form-label mb-2">
                            {{ __('messages.form_email') }}
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <input id="email" 
                                   type="email" 
                                   name="email" 
                                   value="{{ old('email') }}" 
                                   required 
                                   autofocus 
                                   autocomplete="username"
                                   placeholder="{{ __('messages.form_email_placeholder') }}"
                                   class="form-input-icon">
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mb-5">
                        <label for="password" class="form-label mb-2">
                            {{ __('messages.form_password') }}
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                            </div>
                            <input id="password" 
                                   type="password" 
                                   name="password" 
                                   required 
                                   autocomplete="current-password"
                                   placeholder="{{ __('messages.form_password_placeholder') }}"
                                   class="form-input-icon">
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me & Forgot Password -->
                    <div class="flex items-center justify-between mb-6">
                        <label class="flex items-center">
                            <input type="checkbox" 
                                   name="remember" 
                                   class="form-checkbox">
                            <span class="ml-2 text-sm text-gray-600">{{ __('messages.form_remember_me') }}</span>
                        </label>
                        
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" 
                               class="text-link">
                                {{ __('messages.form_forgot_password') }}
                            </a>
                        @endif
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" 
                            class="btn-gradient w-full">
                        {{ __('messages.form_sign_in') }}
                    </button>

                    <!-- Register Link -->
                    @if(!$isAdmin)
                    <div class="mt-6 text-center">
                        <span class="text-sm text-gray-600">{{ __('messages.form_no_account') }}</span>
                        <a href="{{ route('customer.register') }}" 
                           class="text-link ml-1">
                            {{ __('messages.form_sign_up') }}
                        </a>
                    </div>
                    @endif
                </form>
            </div>
        </div>

    </div>
</x-auth-layout>
