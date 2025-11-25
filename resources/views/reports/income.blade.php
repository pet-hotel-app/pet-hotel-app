@extends('layouts.app')

@section('content')
    <h2 class="text-xl font-semibold mb-4">Laporan Pendapatan</h2>

    <form method="get" class="mb-4">
        <input type="date" name="from" value="{{ $from }}"> -
        <input type="date" name="to" value="{{ $to }}">
        <button class="ml-2">Filter</button>
    </form>

    <div class="mb-4">Total: <strong>{{ number_format($total,0,',','.') }}</strong></div>

    <table class="w-full table-auto border-collapse">
        <thead>
            <tr>
                <th class="border p-2">#</th>
                <th class="border p-2">Booking</th>
                <th class="border p-2">Owner</th>
                <th class="border p-2">Amount</th>
                <th class="border p-2">Paid</th>
                <th class="border p-2">Date</th>
            </tr>
        </thead>
        <tbody>
        @foreach($invoices as $inv)
            <tr>
                <td class="border p-2">{{ $inv->id }}</td>
                <td class="border p-2">{{ $inv->booking->id ?? '-' }}</td>
                <td class="border p-2">{{ $inv->booking->owner->name ?? '-' }}</td>
                <td class="border p-2">{{ number_format($inv->amount,0,',','.') }}</td>
                <td class="border p-2">{{ $inv->paid ? 'Yes' : 'No' }}</td>
                <td class="border p-2">{{ $inv->created_at->toDateString() }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
