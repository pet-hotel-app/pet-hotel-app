<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::with('booking.pet.owner')->latest()->paginate(20);
        return view('invoices.index', compact('invoices'));
    }

    public function show(Invoice $invoice)
    {
        $invoice->load('booking.pet.owner');
        return view('invoices.show', compact('invoice'));
    }

    public function update(Request $request, Invoice $invoice)
    {
        $data = $request->validate([
            'paid' => 'required|boolean',
            'payment_method' => 'nullable|string',
        ]);

        $invoice->update(array_merge($data, ['paid_at' => $data['paid'] ? now() : null]));
        return redirect()->route('invoices.show', $invoice)->with('success','Invoice updated');
    }
}
