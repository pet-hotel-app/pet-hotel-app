<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Invoice;
use App\Models\Pet;
use App\Models\Room;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class BookingsSeeder extends Seeder
{
    public function run()
    {
        $pet = Pet::first();
        $room = Room::first();
        if (! $pet || ! $room) return;

        $start = Carbon::now()->addDays(1)->toDateString();
        $end = Carbon::now()->addDays(3)->toDateString();

        $booking = Booking::create([
            'pet_id' => $pet->id,
            'owner_id' => $pet->owner_id,
            'room_id' => $room->id,
            'start_date' => $start,
            'end_date' => $end,
            'status' => 'reserved',
            'total_price' => $room->rate_per_day * 3,
        ]);

        Invoice::create(['booking_id' => $booking->id, 'amount' => $booking->total_price, 'paid' => false]);
    }
}
