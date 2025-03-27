<?php

namespace Modules\CourierServiceCalculator\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 *
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\CourierServiceCalculator\Models\DeliveryJob> $assistantDeliveryJobs
 * @property-read int|null $assistant_delivery_jobs_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\CourierServiceCalculator\Models\DeliveryJob> $primaryDeliveryJobs
 * @property-read int|null $primary_delivery_jobs_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CourierDriver newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CourierDriver newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CourierDriver query()
 * @mixin Eloquent
 */
class CourierDriver extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'forename',
        'surname',
        'dob',
        'email',
        'phone_number',
        'passcode',
    ];
    protected $table = 'courier_drivers';

    /**
     * Relationship to Primary Delivery Jobs
     */
    public function primaryDeliveryJobs(): HasMany
    {
        return $this->hasMany(DeliveryJob::class, 'driver_id');
    }

    /**
     * Relationship to Assistant Delivery Jobs
     */
    public function assistantDeliveryJobs(): HasMany
    {
        return $this->hasMany(DeliveryJob::class, 'assistant_driver_id');
    }
}
