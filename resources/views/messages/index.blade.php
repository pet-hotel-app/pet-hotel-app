<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Customer Messages') }}</h2></x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-6">Customer Conversations</h3>
                    
                    <div class="space-y-3">
                        @forelse($customers as $customer)
                        <a href="{{ route('messages.show', $customer) }}" class="block p-4 border rounded-lg hover:bg-gray-50 transition">
                            <div class="flex justify-between items-center">
                                <div>
                                    <h4 class="font-semibold text-gray-900">{{ $customer->name }}</h4>
                                    <p class="text-sm text-gray-600">{{ $customer->email }}</p>
                                </div>
                                @php
                                    $unreadCount = \App\Models\Message::where('sender_id', $customer->id)
                                        ->where('receiver_id', Auth::id())
                                        ->whereNull('read_at')
                                        ->count();
                                @endphp
                                @if($unreadCount > 0)
                                    <span class="px-3 py-1 bg-pink-600 text-white text-xs rounded-full font-semibold">{{ $unreadCount }} new</span>
                                @endif
                            </div>
                        </a>
                        @empty
                        <div class="text-center py-12">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                            </svg>
                            <p class="mt-4 text-gray-500">No customer messages yet.</p>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
