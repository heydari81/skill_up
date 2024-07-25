<?php

namespace Heydari81\Front\Providers;

use Illuminate\Support\ServiceProvider;

class FrontServiceProviders extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../Routes/front_routes.php');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views','Front');
    }

    public function register()
    {
    }
}

