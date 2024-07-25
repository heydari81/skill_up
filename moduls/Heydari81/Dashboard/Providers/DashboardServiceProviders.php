<?php

namespace Heydari81\Dashboard\Providers;

use Illuminate\Support\ServiceProvider;

class DashboardServiceProviders extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../Routes/dashboard_routes.php');
        //$this->loadMigrationsFrom(__DIR__.'/../Database/Migrations');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views','Dashboard');

    }

    public function register()
    {
    }
}
