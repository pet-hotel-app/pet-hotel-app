@extends('layouts.app')

@section('content')
    <h2 class="text-xl font-semibold mb-4">Room: {{ $room->code }}</h2>

    <div class="mb-2">Type: {{ $room->type }}</div>
    <div class="mb-2">Capacity: {{ $room->capacity }}</div>
    <div class="mb-2">Rate: {{ number_format($room->rate_per_day,0,',','.') }}</div>
    <div class="mb-2">Status: {{ $room->status }}</div>
@endsection
