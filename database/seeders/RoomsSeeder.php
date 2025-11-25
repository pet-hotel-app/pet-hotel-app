<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Seeder;

class RoomsSeeder extends Seeder
{
    public function run()
    {
        Room::create(['code' => 'R101', 'type' => 'Standard', 'capacity' => 1, 'rate_per_day' => 150000, 'status' => 'available']);
        Room::create(['code' => 'R102', 'type' => 'Family', 'capacity' => 2, 'rate_per_day' => 250000, 'status' => 'available']);
        Room::create(['code' => 'R103', 'type' => 'VIP', 'capacity' => 1, 'rate_per_day' => 350000, 'status' => 'available']);
    }
}
