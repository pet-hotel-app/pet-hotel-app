<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServicesSeeder extends Seeder
{
    public function run()
    {
        Service::create(['name' => 'Grooming', 'description' => 'Full grooming package', 'price' => 50000]);
        Service::create(['name' => 'Bath & Dry', 'description' => 'Bath and drying', 'price' => 30000]);
        Service::create(['name' => 'Playtime', 'description' => 'Supervised playtime', 'price' => 20000]);
    }
}
