<x-layout.admin>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Edit Booking') }}</h2></x-slot>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('bookings.update', $booking) }}" method="POST">
                        @csrf @method('PUT')
                        
                        <div class="mb-4">
                            <label for="pet_id" class="block text-sm font-medium text-gray-700 mb-2">Pet *</label>
                            <select name="pet_id" id="pet_id" required class="w-full rounded-md border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500">
                                @foreach($pets as $pet)
                                    <option value="{{ $pet->id }}" {{ old('pet_id', $booking->pet_id) == $pet->id ? 'selected' : '' }}>
                                        {{ $pet->name }} (Owner: {{ $pet->owner->name }})
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="room_id" class="block text-sm font-medium text-gray-700 mb-2">Room</label>
                            <select name="room_id" id="room_id" class="w-full rounded-md border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500">
                                <option value="">No Room</option>
                                @foreach($rooms as $room)
                                    <option value="{{ $room->id }}" {{ old('room_id', $booking->room_id) == $room->id ? 'selected' : '' }}>
                                        {{ $room->code }} - {{ $room->type ?? 'Standard' }} (Rp {{ number_format($room->rate_per_day, 0, ',', '.') }}/day)
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="start_date" class="block text-sm font-medium text-gray-700 mb-2">Start Date *</label>
                            <input type="date" name="start_date" id="start_date" value="{{ old('start_date', $booking->start_date) }}" required class="w-full rounded-md border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500">
                        </div>

                        <div class="mb-4">
                            <label for="end_date" class="block text-sm font-medium text-gray-700 mb-2">End Date *</label>
                            <input type="date" name="end_date" id="end_date" value="{{ old('end_date', $booking->end_date) }}" required class="w-full rounded-md border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500">
                        </div>

                        <div class="mb-6">
                            <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status *</label>
                            <select name="status" id="status" required class="w-full rounded-md border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500">
                                <option value="reserved" {{ old('status', $booking->status) == 'reserved' ? 'selected' : '' }}>Reserved</option>
                                <option value="confirmed" {{ old('status', $booking->status) == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                <option value="pending" {{ old('status', $booking->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="cancelled" {{ old('status', $booking->status) == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
                        </div>

                        <div class="flex items-center justify-end gap-4">
                            <a href="{{ route('bookings.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-400 transition">Cancel</a>
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-[#FFB6C9] border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-pink-500 transition">Update Booking</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout.admin>
