<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('navigation.messages') }}</h2></x-slot>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded"><span>{{ session('success') }}</span></div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-6">Chat with Admin</h3>
                    
                    <!-- Messages Display -->
                    <div class="border rounded-lg p-4 mb-6 bg-gray-50" style="max-height: 500px; overflow-y: auto;" id="messageContainer">
                        @forelse($messages as $message)
                        <div class="mb-4 {{ $message->sender_id == Auth::id() ? 'text-right' : 'text-left' }}">
                            <div class="inline-block max-w-xs lg:max-w-md">
                                <div class="px-4 py-2 rounded-lg {{ $message->sender_id == Auth::id() ? 'bg-pink-500 text-white' : 'bg-white border border-gray-300' }}">
                                    <p class="text-sm">{{ $message->message }}</p>
                                </div>
                                <p class="text-xs text-gray-500 mt-1">
                                    {{ $message->sender->name }} • {{ $message->created_at->diffForHumans() }}
                                </p>
                            </div>
                        </div>
                        @empty
                        <div class="text-center py-8 text-gray-500">
                            <svg class="mx-auto h-12 w-12 text-gray-400 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                            </svg>
                            <p>No messages yet. Start a conversation!</p>
                        </div>
                        @endforelse
                    </div>

                    <!-- Message Input -->
                    <form action="{{ route('customer.messages.store') }}" method="POST">
                        @csrf
                        <div class="flex gap-2">
                            <textarea name="message" rows="2" required class="flex-1 rounded-md border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500" placeholder="Type your message..."></textarea>
                            <button type="submit" class="px-6 py-2 bg-[#FFB6C9] text-white rounded-md font-semibold hover:bg-pink-500 transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Auto-scroll to bottom of messages
        const container = document.getElementById('messageContainer');
        if (container) {
            container.scrollTop = container.scrollHeight;
        }

        // Auto-refresh messages every 10 seconds
        setInterval(() => {
            location.reload();
        }, 10000);
    </script>
</x-app-layout>
