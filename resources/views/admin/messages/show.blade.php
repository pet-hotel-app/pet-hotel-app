<x-layout.admin>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-4">
                <a href="{{ route('messages.index') }}" class="inline-flex items-center justify-center w-10 h-10 bg-gray-200 rounded-full hover:bg-gray-300 transition">
                    <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                </a>
                <div class="flex items-center gap-3">
                    <img class="h-10 w-10 rounded-full object-cover" src="{{ $customer->image ? asset('storage/' . $customer->image) : asset('image/default-profile.png') }}" alt="{{ $customer->name }}">
                    <div>
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            {{ $customer->name }}
                        </h2>
                        <p class="text-sm text-gray-500">{{ $customer->email }}</p>
                    </div>
                </div>
            </div>
            <div class="flex items-center gap-4">
                <button class="inline-flex items-center justify-center w-10 h-10 bg-gray-200 rounded-full hover:bg-gray-300 transition">
                    <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.765L15 14M21 8a9 9 0 18-18 18 9.713 9.713 0 0118-18z"></path></svg>
                </button>
                <button class="inline-flex items-center justify-center w-10 h-10 bg-gray-200 rounded-full hover:bg-gray-300 transition">
                    <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                </button>
            </div>
        </div>
    </x-slot>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="flex flex-col h-[70vh]">
            <!-- Chat History -->
            <div class="flex-grow overflow-y-auto p-6 space-y-4 bg-gray-50" id="messageContainer">
                @forelse ($messages as $message)
                    <div class="flex {{ $message->sender_id === Auth::id() ? 'justify-end' : 'justify-start' }}">
                        <div class="max-w-lg">
                            <div class="px-4 py-2 rounded-lg shadow {{ $message->sender_id === Auth::id() ? 'bg-pink-500 text-white' : 'bg-white' }}">
                                <p class="text-sm font-semibold">{{ $message->sender->name }}</p>
                                <p class="text-sm mt-1">{{ $message->message }}</p>
                                <span class="text-xs opacity-75 block text-right mt-2">{{ $message->created_at->format('H:i') }}</span>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center text-gray-500 pt-16">
                        <p>{{ __('messages.no_messages_yet') }}</p>
                        <p class="text-sm">{{ __('messages.start_conversation') }}</p>
                    </div>
                @endforelse
            </div>

            <!-- Reply Form -->
            <div class="p-6 border-t bg-white">
                <form action="{{ route('messages.store', $customer) }}" method="POST">
                    @csrf
                    <div class="flex items-center gap-4">
                        <textarea name="message" 
                                  rows="2" 
                                  class="w-full rounded-md shadow-sm focus:border-pink-500 focus:ring-pink-500 @error('message') border-red-500 @else border-gray-300 @enderror" 
                                  placeholder="{{ __('messages.type_message_placeholder') }}"></textarea>
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-[#FFB6C9] border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-pink-500 focus:bg-pink-500 active:bg-pink-700 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            {{ __('messages.send') }}
                        </button>
                    </div>
                    @error('message')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </form>
            </div>
        </div>
    </div>

    <script>
        const container = document.getElementById('messageContainer');
        if (container) {
            container.scrollTop = container.scrollHeight;
        }
    </script>
</x-layout.admin>
