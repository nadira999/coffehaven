<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Owner;

class OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Owner::create([
            "nama" => "Admin The Coffee Haven",
            "email" => "owner@coffeehaven.com",
            "password" => Hash::make("password123"),
        ]);
    }
}