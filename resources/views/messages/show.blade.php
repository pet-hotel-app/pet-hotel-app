<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Chat with') }} {{ $customer->name }}</h2></x-slot>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded"><span>{{ session('success') }}</span></div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-6">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">{{ $customer->name }}</h3>
                            <p class="text-sm text-gray-600">{{ $customer->email }}</p>
                        </div>
                        <a href="{{ route('messages.index') }}" class="text-sm text-pink-600 hover:text-pink-800">← Back to all conversations</a>
                    </div>
                    
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
                            <p>No messages yet.</p>
                        </div>
                        @endforelse
                    </div>

                    <!-- Message Input -->
                    <form action="{{ route('messages.store', $customer) }}" method="POST">
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
