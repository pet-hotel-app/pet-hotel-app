<x-layout.admin>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Pet') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('pets.update', $pet) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="owner_id" class="block text-sm font-medium text-gray-700 mb-2">Owner *</label>
                            <select name="owner_id" id="owner_id" required
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500 @error('owner_id') border-red-500 @enderror">
                                <option value="">Select Owner</option>
                                @foreach($owners as $owner)
                                    <option value="{{ $owner->id }}" {{ old('owner_id', $pet->owner_id) == $owner->id ? 'selected' : '' }}>
                                        {{ $owner->name }} - {{ $owner->email }}
                                    </option>
                                @endforeach
                            </select>
                            @error('owner_id')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Pet Name *</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $pet->name) }}" required
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500 @error('name') border-red-500 @enderror">
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="species" class="block text-sm font-medium text-gray-700 mb-2">Species</label>
                            <input type="text" name="species" id="species" value="{{ old('species', $pet->species) }}" placeholder="e.g., Dog, Cat, Bird"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500 @error('species') border-red-500 @enderror">
                            @error('species')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="breed" class="block text-sm font-medium text-gray-700 mb-2">Breed</label>
                            <input type="text" name="breed" id="breed" value="{{ old('breed', $pet->breed) }}"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500 @error('breed') border-red-500 @enderror">
                            @error('breed')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="age" class="block text-sm font-medium text-gray-700 mb-2">Age (years)</label>
                            <input type="number" name="age" id="age" value="{{ old('age', $pet->age) }}" min="0"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500 @error('age') border-red-500 @enderror">
                            @error('age')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="notes" class="block text-sm font-medium text-gray-700 mb-2">Notes</label>
                            <textarea name="notes" id="notes" rows="3"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500 @error('notes') border-red-500 @enderror">{{ old('notes', $pet->notes) }}</textarea>
                            @error('notes')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end gap-4">
                            <a href="{{ route('pets.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-400 focus:bg-gray-400 active:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Cancel
                            </a>
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-[#FFB6C9] border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-pink-500 focus:bg-pink-500 active:bg-pink-700 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Update Pet
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout.admin>
