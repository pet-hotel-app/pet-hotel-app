<x-layout.admin>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('messages.customer_messages') }}
        </h2>
    </x-slot>

    <div class="mb-6">
        <h3 class="text-2xl font-bold text-gray-900">{{ __('messages.customer_messages') }}</h3>
        <p class="text-gray-600 mt-2">{{ __('messages.customer_messages_description') }}</p>
    </div>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-6">{{ __('messages.conversations') }}</h3>
            
            <div class="space-y-3">
                @forelse($customers as $customer)
                @php
                    $lastMessage = $customer->messages()->latest()->first();
                @endphp
                <a href="{{ route('messages.show', $customer) }}" class="block p-4 border rounded-lg hover:bg-gray-50 transition">
                    <div class="flex justify-between items-center">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-full bg-gray-200 flex items-center justify-center font-bold text-gray-600">
                                {{ substr($customer->name, 0, 2) }}
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900">{{ $customer->name }}</h4>
                                <p class="text-sm text-gray-600">{{ $customer->email }}</p>
                            </div>
                        </div>
                        <div class="text-right">
                            @if($lastMessage)
                                <p class="text-xs text-gray-500">{{ __('messages.last_message_on') }} {{ $lastMessage->created_at->format('M d, Y') }}</p>
                                <p class="text-sm text-gray-800 truncate mt-1">{{ $lastMessage->message }}</p>
                            @endif
                        </div>
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </div>
                </a>
                @empty
                <div class="text-center py-12">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                    <p class="mt-4 text-gray-500">{{ __('messages.no_conversations_found') }}</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</x-layout.admin>
