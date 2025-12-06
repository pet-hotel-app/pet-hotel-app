<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('messages.my_profile') }}</h2></x-slot>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded"><span>{{ session('success') }}</span></div>
            @endif

            <!-- Profile Info -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">{{ __('messages.profile_information') }}</h3>
                    <form action="{{ route('customer.updateProfile') }}" method="POST" enctype="multipart/form-data">
                        @csrf @method('PUT')

                        <div class="mb-4">
                                                    <div class="mb-4">
                            <label for="image" class="block text-sm font-medium text-gray-700 mb-2">{{ __('messages.profile_image') }}</label>
                            <div class="mt-2 flex items-center gap-4">
                                <img src="{{ str_starts_with(Auth::user()->image, 'images/profile') ? asset('storage/' . Auth::user()->image) : asset('image/' . basename(Auth::user()->image)) }}" alt="Profile Image" class="h-20 w-20 object-cover rounded-full aspect-square">
                                <input type="file" name="image" id="image" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-pink-50 file:text-pink-700 hover:file:bg-pink-100">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">{{ __('messages.name') }} *</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $owner->name) }}" required class="w-full rounded-md border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500">
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">{{ __('messages.email') }}</label>
                            <input type="email" value="{{ $owner->email }}" disabled class="w-full rounded-md border-gray-300 bg-gray-100 shadow-sm">
                            <p class="mt-1 text-xs text-gray-500">{{ __('messages.email_cannot_be_changed') }}</p>
                        </div>

                        <div class="mb-4">
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">{{ __('messages.phone') }} *</label>
                            <input type="text" name="phone" id="phone" value="{{ old('phone', $owner->phone) }}" required class="w-full rounded-md border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500">
                        </div>

                        <div class="mb-6">
                            <label for="address" class="block text-sm font-medium text-gray-700 mb-2">{{ __('messages.address') }} *</label>
                            <textarea name="address" id="address" rows="3" required class="w-full rounded-md border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500">{{ old('address', $owner->address) }}</textarea>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-[#FFB6C9] border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-pink-500 transition">{{ __('messages.update_profile') }}</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- My Pets -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold text-gray-800">{{ __('messages.my_pets') }}</h3>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @forelse($pets as $pet)
                        <div class="border rounded-lg p-4 bg-gradient-to-br from-pink-50 to-yellow-50">
                            <h4 class="font-semibold text-gray-900 mb-2">{{ $pet->name }}</h4>
                            <div class="text-sm text-gray-600 space-y-1">
                                @if($pet->species)<p>{{ __('messages.species') }}: {{ $pet->species }}</p>@endif
                                @if($pet->breed)<p>{{ __('messages.breed') }}: {{ $pet->breed }}</p>@endif
                                @if($pet->age)<p>{{ __('messages.age') }}: {{ $pet->age }} {{ __('messages.years') }}</p>@endif
                            </div>
                        </div>
                        @empty
                        <div class="col-span-2 text-center py-8 text-gray-500">
                            <p>{{ __('messages.no_pets_yet') }}</p>
                            <p class="text-sm mt-2">{{ __('messages.contact_admin_add_pet') }}</p>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
