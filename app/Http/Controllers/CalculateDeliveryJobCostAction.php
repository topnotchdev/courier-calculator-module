<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Modules\CourierServiceCalculator\Models\DeliveryJob;

class CalculateDeliveryJobCostAction extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, int $id)
    {
        $deliveryJob = DeliveryJob::findOrFail($id);

        if ($deliveryJob) {
            dd($deliveryJob); // TODO: Implement all remaining API endpoints so that this will work. Without drivers and locatiosn etc it wont!
            $calculatedCost = $deliveryJob->calculateTotalCost();
            return response()->json([
                'calculatedCost' => $calculatedCost,
                'message' => 'The Delivery Job has been calculated.',
            ]);
        } else {
            return response()->json(['error' => 'Could not find DeliveryJob object with id ['.$id.']'])->setStatusCode(404);
        }
    }
}
