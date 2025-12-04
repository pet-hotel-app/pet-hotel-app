<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Owner;

class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::create([
            'name' => 'Customer Pet Hotel',
            'email' => 'customer@pethotel.com',
            'password' => bcrypt('password'),
            'role' => 'customer',
            'email_verified_at' => now(),
        ]);

        Owner::create([
            'name' => $user->name,
            'email' => $user->email,
            'phone' => '081234567890',
            'address' => 'Jl. Customer No. 123, Jakarta',
        ]);
    }
}
