<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('messages.my_bookings') }}</h2></x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded"><span>{{ session('success') }}</span></div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-6">{{ __('messages.booking_history') }}</h3>
                    
                    <div class="space-y-4">
                        @forelse($bookings as $booking)
                        <div class="border rounded-lg p-4 hover:shadow-md transition">
                            <div class="flex justify-between items-start">
                                <div class="flex-1">
                                    <div class="flex items-center gap-2 mb-2">
                                        <h4 class="text-lg font-semibold text-gray-900">{{ $booking->pet->name }}</h4>
                                        <span class="px-2 py-1 rounded-full text-xs font-semibold {{ $booking->status == 'confirmed' ? 'bg-green-100 text-green-800' : ($booking->status == 'pending' ? 'bg-yellow-100 text-yellow-800' : ($booking->status == 'cancelled' ? 'bg-red-100 text-red-800' : 'bg-gray-100 text-gray-800')) }}">
                                            {{ __('messages.' . $booking->status) }}
                                        </span>
                                    </div>
                                    
                                    <div class="grid grid-cols-2 gap-4 text-sm text-gray-600">
                                        <div>
                                            <p class="font-medium text-gray-700">{{ __('messages.room') }}</p>
                                            <p>{{ $booking->room ? $booking->room->code : __('messages.not_assigned') }}</p>
                                        </div>
                                        <div>
                                            <p class="font-medium text-gray-700">{{ __('messages.dates') }}</p>
                                            <p>{{ $booking->start_date }} to {{ $booking->end_date }}</p>
                                        </div>
                                        <div>
                                            <p class="font-medium text-gray-700">{{ __('messages.total_price') }}</p>
                                            <p class="text-pink-600 font-semibold">Rp {{ number_format($booking->total_price, 0, ',', '.') }}</p>
                                        </div>
                                        <div>
                                            <p class="font-medium text-gray-700">{{ __('messages.payment') }}</p>
                                            @if($booking->invoice)
                                                <p class="{{ $booking->invoice->paid ? 'text-green-600' : 'text-yellow-600' }} font-semibold">
                                                    {{ $booking->invoice->paid ? __('messages.paid') : __('messages.unpaid') }}
                                                </p>
                                            @else
                                                <p class="text-gray-500">{{ __('messages.no_invoice') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="text-center py-12">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                            <p class="mt-4 text-gray-500">{{ __('messages.no_bookings_yet') }}</p>
                            <a href="{{ route('customer.rooms') }}" class="mt-4 inline-block px-4 py-2 bg-[#FFB6C9] text-white rounded-md hover:bg-pink-500 transition">{{ __('messages.book_a_room') }}</a>
                        </div>
                        @endforelse
                    </div>

                    <div class="mt-6">
                        {{ $bookings->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
