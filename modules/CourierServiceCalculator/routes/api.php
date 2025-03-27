<?php

use App\Http\Controllers\CalculateDeliveryJobCostAction;
use App\Http\Controllers\CreateDeliveryJobAction;
use Illuminate\Support\Facades\Route;

Route::prefix('courier')->group(function () {
    # Driver
//    Route::get('/drivers/{id}');
//    Route::get('/drivers');
//    Route::post('/drivers');
//    Route::patch('/drivers/{id}');
//    Route::delete('/drivers/{id}');

# DeliveryJob
//    Route::get('/delivery-jobs/{id}');
//    Route::get('/delivery-jobs');
    Route::post('/delivery-jobs', CreateDeliveryJobAction::class)->name('courier.create_delivery_job');
//    Route::patch('/delivery-jobs/{id}');
//    Route::delete('/delivery-jobs/{id}');
    Route::get('/delivery-jobs/{id}/calculate_total_cost', CalculateDeliveryJobCostAction::class)->name('courier.calculate_delivery_job_cost');

# DeliveryDestination
//    Route::get('/delivery-destinations/{id}');
//    Route::get('/delivery-destinations');
//    Route::post('/delivery-destinations');
//    Route::patch('/delivery-destinations/{id}');
//    Route::delete('/delivery-destinations/{id}');

# CourierService
//    Route::get('/courier-services/{id}');
//    Route::get('/courier-services');
//    Route::post('/courier-services');
//    Route::patch('/courier-services/{id}');
//    Route::delete('/courier-services/{id}');

# Location
//    Route::get('/locations/{id}');
//    Route::get('/locations');
//    Route::post('/locations');
//    Route::patch('/locations/{id}');
//    Route::delete('/locations/{id}');
});
