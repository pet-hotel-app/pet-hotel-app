<x-layout.admin>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Chat with ') }} {{ $customer->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <!-- Chat History -->
                    <div class="mb-6 h-96 overflow-y-auto p-4 border border-gray-200 rounded-lg bg-gray-50">
                        @forelse ($messages as $message)
                            <div class="flex my-2 {{ $message->sender_id === Auth::id() ? 'justify-end' : 'justify-start' }}">
                                <div class="max-w-lg px-4 py-2 rounded-lg shadow {{ $message->sender_id === Auth::id() ? 'bg-indigo-500 text-white' : 'bg-white' }}">
                                    <p class="text-sm">{{ $message->message }}</p>
                                    <span class="text-xs opacity-75 block text-right mt-1">{{ $message->created_at->format('H:i') }}</span>
                                </div>
                            </div>
                        @empty
                            <div class="text-center text-gray-500">
                                <p>No messages in this conversation yet.</p>
                                <p>Start the conversation by sending a message.</p>
                            </div>
                        @endforelse
                    </div>

                    <!-- Reply Form -->
                    <form action="{{ route('messages.store', $customer) }}" method="POST">
                        @csrf
                        <div class="flex items-center">
                            <textarea name="message" 
                                      rows="2" 
                                      class="form-input flex-grow mr-4" 
                                      placeholder="Type your message here..."></textarea>
                            <button type="submit" class="btn-primary">
                                Send
                            </button>
                        </div>
                        @error('message')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </form>

                    <div class="mt-6">
                        <a href="{{ route('messages.index') }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-500">
                            &larr; Back to all conversations
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout.admin>
