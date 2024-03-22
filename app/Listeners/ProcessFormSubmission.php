<?php

namespace App\Listeners;

use App\Events\FormSubmitted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ProcessFormSubmission implements ShouldQueue
{
    public function __construct()
    {
        //
    }



    public function handle(FormSubmitted $event)
    {
        try {
            
            Log::info("A webhook event has occured");
            Log::info("Processing form submission...");

            $formData = $event->formData;
            Log::info($formData);
            $vehiclePricing = $this->queryVehiclePricing($formData);
            Log::info($vehiclePricing);
            $this->sendToWebhook($vehiclePricing);
        } catch (\Exception $e) {
            Log::error("Error handling form submission: " . $e->getMessage());
            // Handle the error gracefully, e.g., log it or notify the system administrator
        }
    }

    private function queryVehiclePricing($formData)
    {
        Log::info("ProcessFormSubmission@queryVehiclePricing");
        Log::info($formData);
        return \App\Models\VehiclePricing::where('vehicle_id', $formData['vehicle_id'])->get();
    }

    private function sendToWebhook($data)
    {
        Log::info("ProcessFormSubmission@sendToWebhook");
        Log::info($data);

        Http::post('http://localhost:3001/webhook', [
            'data' => $data,
        ]);
    }
}
