<x-layout.admin>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Bookings Report') }}</h2></x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-6">Bookings Statistics</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                        <div class="bg-blue-50 p-6 rounded-lg">
                            <p class="text-sm text-blue-600 font-medium">Total Bookings</p>
                            <p class="text-3xl font-bold text-blue-900 mt-2">{{ $totalBookings }}</p>
                        </div>
                        <div class="bg-green-50 p-6 rounded-lg">
                            <p class="text-sm text-green-600 font-medium">Confirmed Bookings</p>
                            <p class="text-3xl font-bold text-green-900 mt-2">{{ $confirmedBookings }}</p>
                        </div>
                        <div class="bg-yellow-50 p-6 rounded-lg">
                            <p class="text-sm text-yellow-600 font-medium">Pending Bookings</p>
                            <p class="text-3xl font-bold text-yellow-900 mt-2">{{ $pendingBookings }}</p>
                        </div>
                    </div>

                    <div class="mt-8">
                        <h4 class="text-md font-semibold text-gray-700 mb-4">Recent Bookings</h4>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Pet</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Owner</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Room</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Check-in</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($recentBookings as $booking)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $booking->pet->name }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $booking->pet->owner->name }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $booking->room->code }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $booking->start_date }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ ucfirst($booking->status) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout.admin>
