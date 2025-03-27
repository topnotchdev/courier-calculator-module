<?php

namespace Modules\CourierServiceCalculator\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as BaseRouteServiceProvider;
use Illuminate\Support\Facades\Route;

class RoutesServiceProvider extends BaseRouteServiceProvider
{
    public function boot(): void
    {
        $this->routes(function () {
            Route::middleware('api')
            ->prefix('api')
            ->group(__DIR__ . '/../routes/api.php');

            Route::middleware('web')
            ->prefix('web')
            ->group(__DIR__ . '/../routes/web.php');
        });
    }
}
