<?php
namespace Heydari81\RolePermissions\Providers;
use Database\Seeders\DatabaseSeeder;
use Heydari81\RolePermissions\Database\Seeders\RolePermissionTableSeeder;
use Heydari81\RolePermissions\Database\Seeders\UserTableSeeder;
use Illuminate\Support\ServiceProvider;

class RolePermissionsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../Routes/RolePermissions_routes.php');
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views','RolePermissions');

    }

    public function register()
    {
        DatabaseSeeder::$seeders[] = RolePermissionTableSeeder::class;
    }
}
