<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Modules\CourierServiceCalculator\Models\DeliveryJob;

class CreateDeliveryJobAction extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // We would check and validate the payload using a custom request handler
        $deliveryJob = DeliveryJob::create([
            'courier_service_id' => $request->courier_service_id,
            'driver_id' => $request->driver_id,
            'assistant_driver_id' => $request->assistant_driver_id,
            'pickup_location_id' => $request->pickup_location_id,
            'total_distance' => $request->total_distance,
            'requires_two_drivers' => $request->requires_two_drivers,
            'job_date' => $request->job_date,
        ]);

        return response()->json($deliveryJob->toArray());
    }
}
