<?php

namespace Modules\CourierServiceCalculator\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 *
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\CourierServiceCalculator\Models\DeliveryJob> $deliveryJobs
 * @property-read int|null $delivery_jobs_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CourierService newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CourierService newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CourierService query()
 * @mixin Eloquent
 */
class CourierService extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_name',
        'service_description',
        'service_frontend_label',
        'standard_rate',
        'cost_per_mile',
        'second_person_cost',
    ];
    protected $table = 'courier_courier_services';

    /**
     * Relationship to Delivery Jobs
     */
    public function deliveryJobs(): HasMany
    {
        return $this->hasMany(DeliveryJob::class);
    }
}
