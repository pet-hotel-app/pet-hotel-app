@extends('layouts.app')

@section('content')
    <h2 class="text-xl font-semibold mb-4">Bookings</h2>

    <a href="{{ route('bookings.create') }}" class="inline-block mb-4">Add Booking</a>

    <table class="w-full table-auto border-collapse">
        <thead>
            <tr>
                <th class="border p-2">#</th>
                <th class="border p-2">Pet</th>
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
                <td class="border p-2"><a href="{{ route('bookings.show',$b) }}">{{ $b->pet->name ?? '-' }}</a></td>
                <td class="border p-2">{{ $b->room->code ?? '-' }}</td>
                <td class="border p-2">{{ $b->start_date }}</td>
                <td class="border p-2">{{ $b->end_date }}</td>
                <td class="border p-2">{{ $b->status }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $bookings->links() }}
@endsection
