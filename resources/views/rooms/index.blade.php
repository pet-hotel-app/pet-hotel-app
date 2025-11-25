@extends('layouts.app')

@section('content')
    <h2 class="text-xl font-semibold mb-4">Rooms</h2>

    <a href="{{ route('rooms.create') }}" class="inline-block mb-4">Add Room</a>

    <table class="w-full table-auto border-collapse">
        <thead>
            <tr>
                <th class="border p-2">#</th>
                <th class="border p-2">Code</th>
                <th class="border p-2">Type</th>
                <th class="border p-2">Rate</th>
            </tr>
        </thead>
        <tbody>
        @foreach($rooms as $r)
            <tr>
                <td class="border p-2">{{ $r->id }}</td>
                <td class="border p-2"><a href="{{ route('rooms.show',$r) }}">{{ $r->code }}</a></td>
                <td class="border p-2">{{ $r->type }}</td>
                <td class="border p-2">{{ number_format($r->rate_per_day,0,',','.') }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $rooms->links() }}
@endsection
