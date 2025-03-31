<?php

namespace Modules\CourierServiceCalculator\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\CourierServiceCalculator\Models\DeliveryJob;

class DeliveryJobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
