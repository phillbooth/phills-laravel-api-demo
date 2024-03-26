<?php

namespace App\Listeners;

use App\Events\FormSubmitted;
use Illuminate\Contracts\Queue\ShouldQueue;
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

            $formData = $event->formData;

            $vehiclePricing = $this->queryVehiclePricing($formData);

            $this->sendToWebhook($vehiclePricing);
        } catch (\Exception $e) {
            Log::error('Error handling form submission: '.$e->getMessage());
        }
    }

    private function queryVehiclePricing($formData)
    {

        return \App\Models\VehiclePricing::where('vehicle_id', $formData['vehicle_id'])->get();
    }

    private function sendToWebhook($data)
    {

        Http::post('http://localhost:3001/webhook', [
            'data' => $data,
        ]);
    }
}
