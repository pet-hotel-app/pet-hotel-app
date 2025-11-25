<?php

namespace Database\Seeders;

use App\Models\Owner;
use Illuminate\Database\Seeder;

class OwnersSeeder extends Seeder
{
    public function run()
    {
        Owner::create(['name' => 'Alice', 'email' => 'alice@example.com', 'phone' => '0812345678', 'address' => 'Jl. Merdeka 1']);
        Owner::create(['name' => 'Budi', 'email' => 'budi@example.com', 'phone' => '0812987654', 'address' => 'Jl. Sukamaju 2']);
        Owner::create(['name' => 'Citra', 'email' => 'citra@example.com', 'phone' => '0812333444', 'address' => 'Jl. Melati 3']);
    }
}
