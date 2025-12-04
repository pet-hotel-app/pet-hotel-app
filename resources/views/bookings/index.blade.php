<x-layout.admin>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Bookings Management') }}</h2></x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-semibold text-gray-800">All Bookings</h3>
                        <a href="{{ route('bookings.create') }}" class="inline-flex items-center px-4 py-2 bg-[#FFB6C9] border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-pink-500 transition">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                            New Booking
                        </a>
                    </div>
                    @if(session('success'))
                        <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded"><span>{{ session('success') }}</span></div>
                    @endif
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Pet</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Owner</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Room</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Check-in</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Check-out</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($bookings as $booking)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#{{ $booking->id }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $booking->pet->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $booking->pet->owner->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $booking->room->code }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $booking->start_date }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $booking->end_date }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                                {{ $booking->status == 'confirmed' ? 'bg-green-100 text-green-800' : '' }}
                                                {{ $booking->status == 'pending' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                                {{ $booking->status == 'cancelled' ? 'bg-red-100 text-red-800' : '' }}">
                                                {{ ucfirst($booking->status) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <a href="{{ route('bookings.edit', $booking) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</a>
                                            <form action="{{ route('bookings.destroy', $booking) }}" method="POST" class="inline-block" onsubmit="return confirm('Delete this booking?');">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr><td colspan="8" class="px-6 py-4 text-center text-sm text-gray-500">No bookings found. <a href="{{ route('bookings.create') }}" class="text-blue-600">Create first booking</a></td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">{{ $bookings->links() }}</div>
                </div>
            </div>
        </div>
    </div>
</x-layout.admin>
