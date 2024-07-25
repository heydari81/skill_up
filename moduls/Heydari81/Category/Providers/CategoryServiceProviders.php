<?php

namespace Heydari81\Category\Providers;

use Heydari81\Category\Models\Category;
use Heydari81\Category\Policies\CategoryPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class CategoryServiceProviders extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../Routes/category_routes.php');
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views','Categories');
    }

    public function register()
    {
        Gate::before(function ($user){
            return $user->hasRole('super_admin')?true : null;
        });
        Gate::policy(Category::class,CategoryPolicy::class);
    }
}
