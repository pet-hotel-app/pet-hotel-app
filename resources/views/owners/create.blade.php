@extends('layouts.app')

@section('content')
    <h2 class="text-xl font-semibold mb-4">Tambah Owner</h2>

    <form method="post" action="{{ route('owners.store') }}">
        @csrf
        <div class="mb-2"><label>Name</label><input name="name" class="border p-1 w-full" required></div>
        <div class="mb-2"><label>Email</label><input name="email" class="border p-1 w-full"></div>
        <div class="mb-2"><label>Phone</label><input name="phone" class="border p-1 w-full"></div>
        <div class="mb-2"><label>Address</label><textarea name="address" class="border p-1 w-full"></textarea></div>
        <button class="bg-blue-500 text-white px-3 py-1">Save</button>
    </form>
@endsection
