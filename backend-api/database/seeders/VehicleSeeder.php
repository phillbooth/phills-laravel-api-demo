<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vehicle;

class VehicleSeeder extends Seeder
{

    public function run()
    {
        $brands = ['BMW', 'Ford', 'VW', 'Volvo', 'Kia', 'Aston Martin', 'Bentley', 'Jaguar', 'Land Rover', 'Lotus', 'McLaren', 'Mini', 'Rolls-Royce', 'Rover', 'Vauxhall'];
        sort($brands); // Sort brands alphabetically
        
        foreach ($brands as $brand) {
            Vehicle::create(['name' => $brand]);
        }

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
                DB::table('vehicle_pricing')->insert([
                    'vehicle_id' => $vehicle->id,
                    'minimum_purchase_amount' => $data[1],
                ]);
            }
        }
    }
    

}
