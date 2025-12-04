<x-layout.admin>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Add New Room') }}</h2></x-slot>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('rooms.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="code" class="block text-sm font-medium text-gray-700 mb-2">Room Code *</label>
                            <input type="text" name="code" id="code" value="{{ old('code') }}" required class="w-full rounded-md border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500 @error('code') border-red-500 @enderror">
                            @error('code')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="type" class="block text-sm font-medium text-gray-700 mb-2">Type</label>
                            <select name="type" id="type" class="w-full rounded-md border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500">
                                <option value="">Select Type</option>
                                <option value="Standard" {{ old('type') == 'Standard' ? 'selected' : '' }}>Standard</option>
                                <option value="Deluxe" {{ old('type') == 'Deluxe' ? 'selected' : '' }}>Deluxe</option>
                                <option value="Suite" {{ old('type') == 'Suite' ? 'selected' : '' }}>Suite</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="capacity" class="block text-sm font-medium text-gray-700 mb-2">Capacity *</label>
                            <input type="number" name="capacity" id="capacity" value="{{ old('capacity', 1) }}" min="1" required class="w-full rounded-md border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500">
                        </div>
                        <div class="mb-4">
                            <label for="rate_per_day" class="block text-sm font-medium text-gray-700 mb-2">Rate Per Day (Rp) *</label>
                            <input type="number" name="rate_per_day" id="rate_per_day" value="{{ old('rate_per_day') }}" min="0" step="0.01" required class="w-full rounded-md border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500">
                        </div>
                        <div class="mb-6">
                            <label for="notes" class="block text-sm font-medium text-gray-700 mb-2">Notes</label>
                            <textarea name="notes" id="notes" rows="3" class="w-full rounded-md border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500">{{ old('notes') }}</textarea>
                        </div>
                        <div class="flex items-center justify-end gap-4">
                            <a href="{{ route('rooms.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-400 transition">Cancel</a>
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-[#FFB6C9] border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-pink-500 transition">Create Room</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout.admin>
