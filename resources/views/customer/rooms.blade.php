<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Available Rooms') }}</h2></x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-6">
                <h3 class="text-2xl font-bold text-gray-900">Book a Room for Your Pet</h3>
                <p class="text-gray-600 mt-2">Choose from our available rooms</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @forelse($rooms as $room)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition">
                    <div class="bg-gradient-to-r from-pink-400 to-yellow-300 h-32"></div>
                    <div class="p-6">
                        <h4 class="text-xl font-bold text-gray-900 mb-2">Room {{ $room->code }}</h4>
                        <p class="text-gray-600 mb-4">{{ $room->type ?? 'Standard' }}</p>
                        
                        <div class="space-y-2 mb-4">
                            <div class="flex items-center text-sm text-gray-600">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                Capacity: {{ $room->capacity }} pet(s)
                            </div>
                            <div class="flex items-center text-sm text-gray-600">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                Rp {{ number_format($room->rate_per_day, 0, ',', '.') }}/day
                            </div>
                        </div>

                        <a href="{{ route('customer.book', $room) }}" class="block w-full text-center px-4 py-2 bg-[#FFB6C9] text-white rounded-md font-semibold hover:bg-pink-500 transition">
                            Book Now
                        </a>
                    </div>
                </div>
                @empty
                <div class="col-span-3 text-center py-12">
                    <p class="text-gray-500">No rooms available at the moment.</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
