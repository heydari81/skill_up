<?php
namespace Heydari81\User\Providers;
use Database\Seeders\DatabaseSeeder;
use Heydari81\User\Database\Seeders\UserTableSeeder;
use Heydari81\User\Models\User;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider {
    public function boot()
    {
    $this->loadRoutesFrom(__DIR__ . '/../Routes/user_routes.php');
    $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations');
    $this->loadViewsFrom(__DIR__.'/../Resources/Views','User');
        DatabaseSeeder::$seeders[] = UserTableSeeder::class;


    }

    public function register()
    {
       config()->set('auth.providers.users.model',User::class);
    }
}
