@extends('layouts.app')

@section('content')
    <h2 class="text-xl font-semibold mb-4">Invoice #{{ $invoice->id }}</h2>

    <div class="mb-2">Booking: <a href="{{ route('bookings.show', $invoice->booking) }}">{{ $invoice->booking->id ?? '-' }}</a></div>
    <div class="mb-2">Owner: {{ $invoice->booking->owner->name ?? '-' }}</div>
    <div class="mb-2">Amount: {{ number_format($invoice->amount,0,',','.') }}</div>
    <div class="mb-2">Paid: {{ $invoice->paid ? 'Yes' : 'No' }}</div>

    <form method="post" action="{{ route('invoices.update', $invoice) }}">
        @csrf
        @method('PUT')
        <label><input type="checkbox" name="paid" value="1" {{ $invoice->paid ? 'checked' : '' }}> Mark as paid</label>
        <div class="mt-2"><label>Payment method <input name="payment_method" value="{{ $invoice->payment_method }}" class="border p-1"></label></div>
        <button class="bg-blue-500 text-white px-3 py-1 mt-2">Save</button>
    </form>
@endsection
