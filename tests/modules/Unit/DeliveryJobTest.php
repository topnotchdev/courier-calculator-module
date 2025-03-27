<?php

namespace Tests\Modules\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\CourierServiceCalculator\Models\CourierService;
use Modules\CourierServiceCalculator\Models\CourierDriver;
use Modules\CourierServiceCalculator\Models\DeliveryJob;
use Modules\CourierServiceCalculator\Models\DeliveryLocation;
use Tests\TestCase;

class DeliveryJobTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_can_calculate_total_cost_of_delivery_job(): void
    {
        $standard_rate = 20.00;
        $cost_per_mile = 2.50;
        $second_person_cost = 35.50;
        $total_distance = 100; // 100 miles

        $courierService = CourierService::create([
            'service_name' => 'Standard Delivery',
            'service_frontend_label' => 'Standard Delivery',
            'service_description' => 'Standard Delivery description',
            'standard_rate' => $standard_rate,
            'cost_per_mile' => $cost_per_mile,
            'second_person_cost' => $second_person_cost,
        ]);

        $driver = CourierDriver::create([
            'title' => 'Mr',
            'forename' => 'John',
            'surname' => 'Doe',
            'dob' => new \DateTime('1970-01-01'),
            'phone_number' => '1234567890',
            'passcode' => '123456',
            'email' => 'john@example.com',
        ]);

        $pickupLocation = DeliveryLocation::create([
            'customer_title' => 'Customer Title',
            'customer_forename' => 'Customer Forename',
            'customer_surname' => 'Customer Surname',
            'building_number' => 123,
            'street_address' => 'Customer Street, DeliveryEstate, DeliveryTown',
            'city' => 'Delivery City',
            'postal_code' => 'PU1 CDE',
            'latitude' => 51.5074,
            'longitude' => -0.1278,
        ]);

        $deliveryJob = DeliveryJob::create([
            'courier_service_id' => $courierService->id,
            'driver_id' => $driver->id,
            'pickup_location_id' => $pickupLocation->id,
            'total_distance' => $total_distance,
            'requires_two_drivers' => false,
            'job_date' => now(),
            'assistant_driver_id' => null,
        ]);

        $expectedTotalCost = $standard_rate + ($total_distance * $cost_per_mile);

        // Calculate and verify the total cost
        $calculatedCost = $deliveryJob->calculateTotalCost();

        $this->assertEquals($expectedTotalCost, $calculatedCost, 'Total cost calculation incorrect for single driver job');
        $this->assertEquals($expectedTotalCost, $deliveryJob->total_cost, 'Saved job cost does not match calculated cost');
    }

    public function test_it_can_calculate_total_cost_of_delivery_for_two_driver_job()
    {
        $standard_rate = 25.00;
        $cost_per_mile = 3.00;
        $second_person_cost = 50.00;
        $total_distance = 100; // 100 miles

        $courierService = CourierService::create([
            'service_name' => 'Premium Delivery',
            'service_frontend_label' => 'Premium Delivery',
            'service_description' => 'Premium Delivery description',
            'standard_rate' => $standard_rate,
            'cost_per_mile' => $cost_per_mile,
            'second_person_cost' => $second_person_cost,
        ]);

        $primaryDriver = CourierDriver::create([
            'title' => 'Mr',
            'forename' => 'John',
            'surname' => 'Doe',
            'dob' => new \DateTime('1970-01-01'),
            'phone_number' => '1234567890',
            'passcode' => '123456',
            'email' => 'john@example.com',
        ]);

        $assistantDriver = CourierDriver::create([
            'title' => 'Mr',
            'forename' => 'Mike',
            'surname' => 'Johnson',
            'dob' => new \DateTime('1970-01-01'),
            'email' => 'mike@example.com',
            'phone_number' => '5555555555',
            'passcode' => '654321',
        ]);

        $pickupLocation = DeliveryLocation::create([
            'customer_title' => 'Customer Title',
            'customer_forename' => 'Customer Forename',
            'customer_surname' => 'Customer Surname',
            'building_number' => 123,
            'street_address' => 'Customer Street, DeliveryEstate, DeliveryTown',
            'city' => 'Delivery City',
            'postal_code' => 'PU1 CDE',
            'latitude' => 51.5074,
            'longitude' => -0.1278,
        ]);

        // Create a two-driver delivery job
        $deliveryJob = DeliveryJob::create([
            'courier_service_id' => $courierService->id,
            'driver_id' => $primaryDriver->id,
            'assistant_driver_id' => $assistantDriver->id,
            'pickup_location_id' => $pickupLocation->id,
            'total_distance' => $total_distance,
            'requires_two_drivers' => true,
            'job_date' => now()
        ]);

        $expectedTotalCost = $standard_rate + ($total_distance * $cost_per_mile) + $second_person_cost;

        // Calculate and verify the total cost
        $calculatedCost = $deliveryJob->calculateTotalCost();

        $this->assertEquals($expectedTotalCost, $calculatedCost, 'Total cost calculation incorrect for two-driver job');
        $this->assertEquals($expectedTotalCost, $deliveryJob->total_cost, 'Saved job cost does not match calculated cost');
    }
}
