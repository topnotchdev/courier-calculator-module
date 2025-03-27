<?php

namespace Modules\CourierServiceCalculator\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 *
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\CourierServiceCalculator\Models\DeliveryDestination> $deliveryDestinations
 * @property-read int|null $delivery_destinations_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\CourierServiceCalculator\Models\DeliveryJob> $pickupDeliveryJobs
 * @property-read int|null $pickup_delivery_jobs_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeliveryLocation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeliveryLocation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeliveryLocation query()
 * @mixin Eloquent
 */
class DeliveryLocation extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_title',
        'customer_forename',
        'customer_surname',
        'building_number',
        'street_address',
        'city',
        'postal_code',
        'country',
        'latitude',
        'longitude',
    ];
    protected $table = 'courier_locations';

    /**
     * Relationship to Pickup Delivery Jobs
     */
    public function pickupDeliveryJobs(): HasMany
    {
        return $this->hasMany(DeliveryJob::class, 'pickup_location_id');
    }

    /**
     * Relationship to Delivery Destinations
     */
    public function deliveryDestinations(): HasMany
    {
        return $this->hasMany(DeliveryDestination::class);
    }
}
