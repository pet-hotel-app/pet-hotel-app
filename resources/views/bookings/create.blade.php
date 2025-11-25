@extends('layouts.app')

@section('content')
    <h2 class="text-xl font-semibold mb-4">Tambah Booking</h2>

    <form method="post" action="{{ route('bookings.store') }}">
        @csrf
        <div class="mb-2"><label>Pet</label>
            <select name="pet_id" class="border p-1 w-full">
                @foreach($pets as $p)
                    <option value="{{ $p->id }}">{{ $p->name }} ({{ $p->owner->name ?? '' }})</option>
                @endforeach
            </select>
        </div>
        <div class="mb-2"><label>Room (optional)</label>
            <select name="room_id" class="border p-1 w-full">
                <option value="">-- none --</option>
                @foreach($rooms as $r)
                    <option value="{{ $r->id }}">{{ $r->code }} - {{ $r->type }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-2"><label>Start Date</label><input type="date" name="start_date" class="border p-1 w-full" required></div>
        <div class="mb-2"><label>End Date</label><input type="date" name="end_date" class="border p-1 w-full" required></div>
        <button class="bg-blue-500 text-white px-3 py-1">Save</button>
    </form>
@endsection
