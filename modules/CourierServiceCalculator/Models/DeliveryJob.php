<?php

namespace Modules\CourierServiceCalculator\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 *
 *
 * @property-read \Modules\CourierServiceCalculator\Models\CourierDriver|null $assistantDriver
 * @property-read \Modules\CourierServiceCalculator\Models\CourierService|null $courierService
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\CourierServiceCalculator\Models\DeliveryDestination> $deliveryDestinations
 * @property-read int|null $delivery_destinations_count
 * @property-read \Modules\CourierServiceCalculator\Models\CourierDriver|null $driver
 * @property-read \Modules\CourierServiceCalculator\Models\DeliveryLocation|null $pickupLocation
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeliveryJob newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeliveryJob newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeliveryJob query()
 * @mixin Eloquent
 */
class DeliveryJob extends Model
{
    use HasFactory;

    protected $fillable = [
        'courier_service_id',
        'driver_id',
        'assistant_driver_id',
        'pickup_location_id',
        'total_distance',
        'requires_two_drivers',
        'job_date',
        'total_cost',
    ];
    protected $table = 'courier_delivery_jobs';

    /**
     * Relationship to Courier Service
     */
    public function courierService(): BelongsTo
    {
        return $this->belongsTo(CourierService::class);
    }

    /**
     * Relationship to Primary Driver
     */
    public function driver(): BelongsTo
    {
        return $this->belongsTo(CourierDriver::class, 'driver_id');
    }

    /**
     * Relationship to Assistant Driver (if applicable)
     */
    public function assistantDriver(): BelongsTo
    {
        return $this->belongsTo(CourierDriver::class, 'assistant_driver_id');
    }

    /**
     * Relationship to Pickup Location
     */
    public function pickupLocation(): BelongsTo
    {
        return $this->belongsTo(DeliveryLocation::class, 'pickup_location_id');
    }

    /**
     * Relationship to Delivery Destinations
     */
    public function deliveryDestinations(): HasMany
    {
        return $this->hasMany(DeliveryDestination::class);
    }

    /**
     * Calculate the total cost for the delivery job
     *
     * @return float
     */
    public function calculateTotalCost(): float|int
    {
        $courierService = $this->courierService;

        // Base calculation of cost based on distance
        $distanceCost = $this->total_distance * $courierService->cost_per_mile;

        // Additional cost for two-driver jobs
        $driverSupplementCost = $this->requires_two_drivers
            ? $courierService->second_person_cost
            : 0;

        // Calculate total cost
        $totalCost = $courierService->standard_rate + $distanceCost + $driverSupplementCost;

        // Save the calculated cost
        $this->total_cost = $totalCost;
        $this->save();

        return $totalCost;
    }
}
