<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Invoice;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function bookings(Request $request)
    {
        $totalBookings = Booking::count();
        $confirmedBookings = Booking::where('status', 'confirmed')->count();
        $pendingBookings = Booking::where('status', 'pending')->count();
        $recentBookings = Booking::with('pet.owner', 'room')->latest()->take(10)->get();

        return view('reports.bookings', compact('totalBookings', 'confirmedBookings', 'pendingBookings', 'recentBookings'));
    }

    public function income(Request $request)
    {
        $invoices = Invoice::with('booking.pet.owner')->get();
        $totalRevenue = $invoices->sum('amount');
        $paidAmount = $invoices->where('paid', true)->sum('amount');
        $unpaidAmount = $invoices->where('paid', false)->sum('amount');
        $totalInvoices = $invoices->count();
        $recentInvoices = Invoice::with('booking.pet.owner')->latest()->take(10)->get();

        return view('reports.income', compact('totalRevenue', 'paidAmount', 'unpaidAmount', 'totalInvoices', 'recentInvoices'));
    }
}
