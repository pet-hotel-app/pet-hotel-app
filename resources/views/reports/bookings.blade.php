@extends('layouts.app')

@section('content')
    <h2 class="text-xl font-semibold mb-4">Laporan Bookings</h2>

    <form method="get" class="mb-4">
        <input type="date" name="from" value="{{ $from }}"> -
        <input type="date" name="to" value="{{ $to }}">
        <button class="ml-2">Filter</button>
    </form>

    <table class="w-full table-auto border-collapse">
        <thead>
            <tr>
                <th class="border p-2">#</th>
                <th class="border p-2">Pet</th>
                <th class="border p-2">Owner</th>
                <th class="border p-2">Room</th>
                <th class="border p-2">Start</th>
                <th class="border p-2">End</th>
                <th class="border p-2">Status</th>
            </tr>
        </thead>
        <tbody>
        @foreach($bookings as $b)
            <tr>
                <td class="border p-2">{{ $b->id }}</td>
                <td class="border p-2">{{ $b->pet->name ?? '-' }}</td>
                <td class="border p-2">{{ $b->owner->name ?? '-' }}</td>
                <td class="border p-2">{{ $b->room->code ?? '-' }}</td>
                <td class="border p-2">{{ $b->start_date }}</td>
                <td class="border p-2">{{ $b->end_date }}</td>
                <td class="border p-2">{{ $b->status }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
