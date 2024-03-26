<?php

namespace App\Http\Controllers;

use App\Http\Resources\VehicleResource;
use App\Models\Vehicle;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::orderBy('name', 'asc')->get();

        return VehicleResource::collection($vehicles);
    }
}
