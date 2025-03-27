<?php

namespace Modules\CourierServiceCalculator\Providers;

use Closure;
use Illuminate\Support\ServiceProvider;

class CourierServiceProvider extends ServiceProvider
{
    public function register(): void
    {
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->mergeConfigFrom(__DIR__ . '/../config.php', 'courierServiceCalculatorConfig');

        // Additional module ServiceProvider's
        $this->app->register(RoutesServiceProvider::class);
    }
}
