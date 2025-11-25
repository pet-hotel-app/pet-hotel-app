<?php

namespace Database\Seeders;

use App\Models\Pet;
use App\Models\Owner;
use Illuminate\Database\Seeder;

class PetsSeeder extends Seeder
{
    public function run()
    {
        $owners = Owner::all();
        if ($owners->isEmpty()) return;

        Pet::create(['owner_id' => $owners->first()->id, 'name' => 'Kiko', 'species' => 'Dog', 'breed' => 'Beagle', 'age' => 3]);
        Pet::create(['owner_id' => $owners->skip(1)->first()->id ?? $owners->first()->id, 'name' => 'Mimi', 'species' => 'Cat', 'breed' => 'Siamese', 'age' => 2]);
        Pet::create(['owner_id' => $owners->last()->id, 'name' => 'Rex', 'species' => 'Dog', 'breed' => 'Labrador', 'age' => 5]);
    }
}
