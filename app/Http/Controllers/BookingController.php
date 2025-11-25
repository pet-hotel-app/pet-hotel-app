<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Pet;
use App\Models\Owner;
use App\Models\Room;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with(['pet.owner','room'])->latest()->paginate(20);
        return view('bookings.index', compact('bookings'));
    }

    public function create()
    {
        $pets = Pet::with('owner')->get();
        $rooms = Room::where('status','available')->get();
        return view('bookings.create', compact('pets','rooms'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'pet_id' => 'required|exists:pets,id',
            'room_id' => 'nullable|exists:rooms,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $pet = Pet::findOrFail($data['pet_id']);
        $owner = $pet->owner;

        $booking = Booking::create([
            'pet_id' => $pet->id,
            'owner_id' => $owner->id,
            'room_id' => $data['room_id'] ?? null,
            'start_date' => $data['start_date'],
            'end_date' => $data['end_date'],
            'status' => 'reserved',
            'total_price' => 0,
        ]);

        // Calculate basic price: room rate * nights
        $days = Carbon::parse($data['start_date'])->diffInDays(Carbon::parse($data['end_date'])) + 1;
        $total = 0;
        if ($booking->room) {
            $total += $booking->room->rate_per_day * $days;
            // mark room as reserved temporarily
            $booking->room->update(['status' => 'reserved']);
        }

        $booking->update(['total_price' => $total]);

        // create invoice
        $invoice = Invoice::create([
            'booking_id' => $booking->id,
            'amount' => $total,
            'paid' => false,
        ]);

        return redirect()->route('bookings.show', $booking)->with('success','Booking created');
    }

    public function show(Booking $booking)
    {
        $booking->load(['pet.owner','room','invoice']);
        return view('bookings.show', compact('booking'));
    }
}
