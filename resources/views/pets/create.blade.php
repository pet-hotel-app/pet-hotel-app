@extends('layouts.app')

@section('content')
    <h2 class="text-xl font-semibold mb-4">Tambah Pet</h2>

    <form method="post" action="{{ route('pets.store') }}">
        @csrf
        <div class="mb-2"><label>Owner</label>
            <select name="owner_id" class="border p-1 w-full">
                @foreach($owners as $o)
                    <option value="{{ $o->id }}">{{ $o->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-2"><label>Name</label><input name="name" class="border p-1 w-full" required></div>
        <div class="mb-2"><label>Species</label><input name="species" class="border p-1 w-full"></div>
        <div class="mb-2"><label>Breed</label><input name="breed" class="border p-1 w-full"></div>
        <div class="mb-2"><label>Age</label><input name="age" type="number" class="border p-1 w-full"></div>
        <button class="bg-blue-500 text-white px-3 py-1">Save</button>
    </form>
@endsection
