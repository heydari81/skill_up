<?php

namespace Heydari81\Media\Providers;

use Illuminate\Support\ServiceProvider;

class MediaServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../Routes/media_routes.php');
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views','Media');
        $this->mergeConfigFrom(__DIR__.'/../config/mediafile.php','mediafile');
    }

    public function register()
    {

}
}
