@extends('layouts.app')

@section('content')
    <h2 class="text-xl font-semibold mb-4">Invoices</h2>

    <table class="w-full table-auto border-collapse">
        <thead>
            <tr>
                <th class="border p-2">#</th>
                <th class="border p-2">Booking</th>
                <th class="border p-2">Owner</th>
                <th class="border p-2">Amount</th>
                <th class="border p-2">Paid</th>
            </tr>
        </thead>
        <tbody>
        @foreach($invoices as $inv)
            <tr>
                <td class="border p-2">{{ $inv->id }}</td>
                <td class="border p-2"><a href="{{ route('bookings.show', $inv->booking) }}">{{ $inv->booking->id ?? '-' }}</a></td>
                <td class="border p-2">{{ $inv->booking->owner->name ?? '-' }}</td>
                <td class="border p-2">{{ number_format($inv->amount,0,',','.') }}</td>
                <td class="border p-2">{{ $inv->paid ? 'Yes' : 'No' }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $invoices->links() }}
@endsection
