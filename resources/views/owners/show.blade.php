@extends('layouts.app')

@section('content')
    <h2 class="text-xl font-semibold mb-4">Owner: {{ $owner->name }}</h2>

    <div class="mb-2">Email: {{ $owner->email }}</div>
    <div class="mb-2">Phone: {{ $owner->phone }}</div>
    <div class="mb-2">Address: {{ $owner->address }}</div>

    <h3 class="mt-4 font-semibold">Pets</h3>
    <ul>
        @foreach($owner->pets as $pet)
            <li><a href="{{ route('pets.show', $pet) }}">{{ $pet->name }}</a></li>
        @endforeach
    </ul>
@endsection
