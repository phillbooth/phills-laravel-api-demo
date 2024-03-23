<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Vehicle; // Import the Vehicle model

class VehiclePricingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vehiclePricingData = [
            ['BMW', 30000],
            ['Ford', 20000],
            ['VW', 25000],
            ['Volvo', 35000],
            ['Kia', 18000],
            ['Aston Martin', 100000],
            ['Bentley', 200000],
            ['Jaguar', 50000],
            ['Land Rover', 60000],
            ['Lotus', 75000],
            ['McLaren', 230000],
            ['Mini', 22000],
            ['Rolls-Royce', 350000],
            ['Rover', 15000],
            ['Vauxhall', 17000]
        ];
        
        foreach ($vehiclePricingData as $data) {
            $vehicle = Vehicle::where('name', $data[0])->first();
            if ($vehicle) {
                DB::table('vehicle_pricings')->insert([
                    'vehicle_id' => $vehicle->id,
                    'minimum_purchase_amount' => $data[1],
                ]);
            }
        }
    }
}
