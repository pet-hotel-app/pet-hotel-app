<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('messages.my_pets') }}</h2></x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded"><span>{{ session('success') }}</span></div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-semibold text-gray-800">{{ __('messages.my_pets') }}</h3>
                        <a href="{{ route('customer.pets.create') }}" class="inline-flex items-center px-4 py-2 bg-[#FFB6C9] border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-pink-500 transition">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                            {{ __('messages.add_new_pet') }}
                        </a>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @forelse($pets as $pet)
                        <div class="border rounded-lg overflow-hidden hover:shadow-lg transition">
                            <img src="{{ str_starts_with($pet->image, 'images/pets') ? asset('storage/' . $pet->image) : asset('image/' . basename($pet->image)) }}" alt="{{ $pet->name }}" class="h-32 w-full object-cover aspect-square">
                            <div class="p-4">
                                <h4 class="text-xl font-bold text-gray-900 mb-2">{{ $pet->name }}</h4>
                                <div class="space-y-1 text-sm text-gray-600 mb-4">
                                    @if($pet->species)<p><span class="font-medium">{{ __('messages.species') }}:</span> {{ $pet->species }}</p>@endif
                                    @if($pet->breed)<p><span class="font-medium">{{ __('messages.breed') }}:</span> {{ $pet->breed }}</p>@endif
                                    @if($pet->age)<p><span class="font-medium">{{ __('messages.age') }}:</span> {{ $pet->age }} {{ __('messages.years') }}</p>@endif
                                    @if($pet->notes)<p class="text-xs mt-2 text-gray-500">{{ Str::limit($pet->notes, 50) }}</p>@endif
                                </div>
                                <div class="flex gap-2">
                                    <a href="{{ route('customer.pets.edit', $pet) }}" class="flex-1 text-center px-3 py-2 bg-yellow-100 text-yellow-700 rounded-md text-sm font-medium hover:bg-yellow-200 transition">
                                        {{ __('messages.edit') }}
                                    </a>
                                    <form action="{{ route('customer.pets.destroy', $pet) }}" method="POST" class="flex-1" onsubmit="return confirm('{{ __('messages.delete_pet_confirmation') }}')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="w-full px-3 py-2 bg-red-100 text-red-700 rounded-md text-sm font-medium hover:bg-red-200 transition">
                                            {{ __('messages.delete') }}
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-span-3 text-center py-12">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <p class="mt-4 text-gray-500">{{ __('messages.no_pets_yet') }}</p>
                            <a href="{{ route('customer.pets.create') }}" class="mt-4 inline-block px-4 py-2 bg-[#FFB6C9] text-white rounded-md hover:bg-pink-500 transition">{{ __('messages.add_your_first_pet') }}</a>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
