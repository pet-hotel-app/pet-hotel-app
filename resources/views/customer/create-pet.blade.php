<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('messages.add_new_pet') }}</h2></x-slot>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-6">{{ __('messages.pet_information') }}</h3>

                    <form action="{{ route('customer.pets.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">{{ __('messages.pet_name') }} *</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" required class="w-full rounded-md border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500 @error('name') border-red-500 @enderror">
                            @error('name')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="species" class="block text-sm font-medium text-gray-700 mb-2">{{ __('messages.species') }} *</label>
                            <select name="species" id="species" required class="w-full rounded-md border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500 @error('species') border-red-500 @enderror">
                                <option value="">{{ __('messages.select_species') }}</option>
                                <option value="Dog" {{ old('species') == 'Dog' ? 'selected' : '' }}>{{ __('messages.dog') }}</option>
                                <option value="Cat" {{ old('species') == 'Cat' ? 'selected' : '' }}>{{ __('messages.cat') }}</option>
                                <option value="Bird" {{ old('species') == 'Bird' ? 'selected' : '' }}>{{ __('messages.bird') }}</option>
                                <option value="Rabbit" {{ old('species') == 'Rabbit' ? 'selected' : '' }}>{{ __('messages.rabbit') }}</option>
                                <option value="Hamster" {{ old('species') == 'Hamster' ? 'selected' : '' }}>{{ __('messages.hamster') }}</option>
                                <option value="Other" {{ old('species') == 'Other' ? 'selected' : '' }}>{{ __('messages.other') }}</option>
                            </select>
                            @error('species')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="breed" class="block text-sm font-medium text-gray-700 mb-2">{{ __('messages.breed') }}</label>
                            <input type="text" name="breed" id="breed" value="{{ old('breed') }}" class="w-full rounded-md border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500 @error('breed') border-red-500 @enderror">
                            @error('breed')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="age" class="block text-sm font-medium text-gray-700 mb-2">{{ __('messages.age_years') }}</label>
                            <input type="number" name="age" id="age" value="{{ old('age') }}" min="0" step="0.1" class="w-full rounded-md border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500 @error('age') border-red-500 @enderror">
                            @error('age')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                        </div>

                        <div class="mb-6">
                            <label for="notes" class="block text-sm font-medium text-gray-700 mb-2">{{ __('messages.notes') }}</label>
                            <textarea name="notes" id="notes" rows="4" class="w-full rounded-md border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500 @error('notes') border-red-500 @enderror" placeholder="{{ __('messages.special_requirements_placeholder') }}">{{ old('notes') }}</textarea>
                            @error('notes')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                        </div>

                        <div class="flex items-center justify-end gap-4">
                            <a href="{{ route('customer.pets.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-400 transition">{{ __('messages.cancel') }}</a>
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-[#FFB6C9] border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-pink-500 transition">{{ __('messages.add_pet') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
