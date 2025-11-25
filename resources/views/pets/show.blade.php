@extends('layouts.app')

@section('content')
    <h2 class="text-xl font-semibold mb-4">Pet: {{ $pet->name }}</h2>

    <div class="mb-2">Owner: <a href="{{ route('owners.show', $pet->owner) }}">{{ $pet->owner->name ?? '-' }}</a></div>
    <div class="mb-2">Species: {{ $pet->species }}</div>
    <div class="mb-2">Breed: {{ $pet->breed }}</div>
    <div class="mb-2">Age: {{ $pet->age }}</div>
    <div class="mb-2">Notes: {{ $pet->notes }}</div>
@endsection
