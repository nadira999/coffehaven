<?php

namespace Database\Seeders;

use App\Models\Owner;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Owner::create([
            "nama" => "Owner Coffee Haven",
            "email" => "owner@coffeehaven.com",
            "password" => Hash::make("password123")
        ]);
    }
}