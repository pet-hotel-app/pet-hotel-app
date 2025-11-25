<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Invoice;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function bookings(Request $request)
    {
        $from = $request->query('from', now()->subMonth()->toDateString());
        $to = $request->query('to', now()->toDateString());

        $bookings = Booking::with('pet.owner','room')
            ->whereBetween('start_date', [$from, $to])
            ->orderBy('start_date','desc')
            ->get();

        return view('reports.bookings', compact('bookings','from','to'));
    }

    public function income(Request $request)
    {
        $from = $request->query('from', now()->subMonth()->toDateString());
        $to = $request->query('to', now()->toDateString());

        $invoices = Invoice::whereBetween('created_at', [$from, $to])->get();
        $total = $invoices->sum('amount');

        return view('reports.income', compact('invoices','total','from','to'));
    }
}
        $total = $invoices->sum('amount');
