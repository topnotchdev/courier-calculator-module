<?php

use Illuminate\Support\Facades\Route;
use Modules\CourierServiceCalculator\Http\Controllers\CalculateDeliveryJobCostAction;
use Modules\CourierServiceCalculator\Http\Controllers\CourierDriverController;
use Modules\CourierServiceCalculator\Http\Controllers\CourierServiceController;
use Modules\CourierServiceCalculator\Http\Controllers\DeliveryDestinationController;
use Modules\CourierServiceCalculator\Http\Controllers\DeliveryJobController;
use Modules\CourierServiceCalculator\Http\Controllers\DeliveryLocationController;

Route::prefix('courier')->group(function () {
    # Driver
    Route::apiResource('drivers', CourierDriverController::class);
# CourierService
    Route::apiResource('services', CourierServiceController::class);
# DeliveryJob
    Route::post(
        '/deliveries/{id}/calculate_total_cost',
        CalculateDeliveryJobCostAction::class
    )->name('courier.calculate_delivery_job_cost');
    Route::apiResource('deliveries', DeliveryJobController::class);
# DeliveryDestination
    Route::apiResource('destinations', DeliveryDestinationController::class);
# Location
    Route::apiResource('locations', DeliveryLocationController::class);
});

