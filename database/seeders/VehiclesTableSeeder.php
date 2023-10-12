<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vehicle;

class VehiclesTableSeeder extends Seeder {
    public function run() {
        Vehicle::factory(10)->create(); // Membuat 10 data fake untuk tabel vehicles
    }
}
