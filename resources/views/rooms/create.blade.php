@extends('layouts.app')

@section('content')
    <h2 class="text-xl font-semibold mb-4">Tambah Room</h2>

    <form method="post" action="{{ route('rooms.store') }}">
        @csrf
        <div class="mb-2"><label>Code</label><input name="code" class="border p-1 w-full" required></div>
        <div class="mb-2"><label>Type</label><input name="type" class="border p-1 w-full"></div>
        <div class="mb-2"><label>Capacity</label><input name="capacity" type="number" class="border p-1 w-full"></div>
        <div class="mb-2"><label>Rate per day</label><input name="rate_per_day" type="number" step="0.01" class="border p-1 w-full"></div>
        <button class="bg-blue-500 text-white px-3 py-1">Save</button>
    </form>
@endsection
