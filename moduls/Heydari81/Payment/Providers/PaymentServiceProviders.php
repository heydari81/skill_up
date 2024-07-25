<?php

namespace Heydari81\Payment\Providers;

use Heydari81\Payment\Gateways\Gateway;
use Heydari81\Payment\Gateways\Zarinpal\ZarinpalAdaptor;
use Illuminate\Support\ServiceProvider;

class PaymentServiceProviders extends ServiceProvider
{
    public function boot()
    {

    }

    public function register()
    {
        $this->loadRoutesFrom(__DIR__ . '/../Routes/payment_routes.php');
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views','Payments');
        $this->app->singleton(Gateway::class,function ($app){
            return new ZarinpalAdaptor();
        });
    }
}
