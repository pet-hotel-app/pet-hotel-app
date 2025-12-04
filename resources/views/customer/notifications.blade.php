<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Notifications') }}</h2></x-slot>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-semibold text-gray-800">All Notifications</h3>
                        @if($notifications->where('read_at', null)->count() > 0)
                        <form action="{{ route('customer.notifications.markAllRead') }}" method="POST">
                            @csrf
                            <button type="submit" class="text-sm text-pink-600 hover:text-pink-800">Mark all as read</button>
                        </form>
                        @endif
                    </div>

                    <div class="space-y-3">
                        @forelse($notifications as $notification)
                        <div class="p-4 rounded-lg border {{ $notification->read_at ? 'bg-white' : 'bg-pink-50 border-pink-200' }}">
                            <div class="flex items-start justify-between">
                                <div class="flex-1">
                                    <div class="flex items-center gap-2 mb-1">
                                        @if($notification->type == 'booking_confirmed')
                                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        @elseif($notification->type == 'booking_cancelled')
                                            <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        @elseif($notification->type == 'payment_received')
                                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                        @else
                                            <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        @endif
                                        <h4 class="font-semibold text-gray-900">{{ $notification->title }}</h4>
                                        @if(!$notification->read_at)
                                            <span class="px-2 py-0.5 bg-pink-600 text-white text-xs rounded-full">New</span>
                                        @endif
                                    </div>
                                    <p class="text-sm text-gray-600 mb-2">{{ $notification->message }}</p>
                                    <p class="text-xs text-gray-400">{{ $notification->created_at->diffForHumans() }}</p>
                                </div>
                                @if(!$notification->read_at)
                                <form action="{{ route('customer.notifications.markRead', $notification) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="text-xs text-pink-600 hover:text-pink-800 ml-4">Mark as read</button>
                                </form>
                                @endif
                            </div>
                        </div>
                        @empty
                        <div class="text-center py-12">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                            </svg>
                            <p class="mt-4 text-gray-500">No notifications yet.</p>
                        </div>
                        @endforelse
                    </div>

                    <div class="mt-6">
                        {{ $notifications->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
