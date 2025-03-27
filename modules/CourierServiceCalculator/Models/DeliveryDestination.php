<?php

namespace Modules\CourierServiceCalculator\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 *
 *
 * @property-read \Modules\CourierServiceCalculator\Models\DeliveryJob|null $deliveryJob
 * @property-read \Modules\CourierServiceCalculator\Models\DeliveryLocation|null $location
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeliveryDestination newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeliveryDestination newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeliveryDestination query()
 * @mixin Eloquent
 */
class DeliveryDestination extends Model
{
    use HasFactory;

    protected $fillable = [
        'delivery_job_id',
        'location_id',
        'distance_from_pickup',
        'delivery_order'
    ];
    protected $table = 'courier_delivery_destinations';

    /**
     * Relationship to Delivery Job
     */
    public function deliveryJob(): BelongsTo
    {
        return $this->belongsTo(DeliveryJob::class);
    }

    /**
     * Relationship to Location
     */
    public function location(): BelongsTo
    {
        return $this->belongsTo(DeliveryLocation::class);
    }
}
