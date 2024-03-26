<?php

namespace Database\Seeders;

use App\Models\Vehicle;
use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    public function run()
    {
        $brands = ['BMW', 'Ford', 'VW', 'Volvo', 'Kia', 'Aston Martin', 'Bentley', 'Jaguar', 'Land Rover', 'Lotus', 'McLaren', 'Mini', 'Rolls-Royce', 'Rover', 'Vauxhall'];
        sort($brands); // Sort brands alphabetically

        foreach ($brands as $brand) {
            Vehicle::create(['name' => $brand]);
        }

    }
}
