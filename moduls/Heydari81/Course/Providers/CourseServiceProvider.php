<?php

namespace Heydari81\Course\Providers;

use Heydari81\Course\Models\course;
use Heydari81\Course\Models\Lesson;
use Heydari81\Course\Models\Season;
use Heydari81\Course\Policies\CoursePolicy;
use Heydari81\Course\Policies\LessonPolicy;
use Heydari81\Course\Policies\SeasonPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class CourseServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->register(EventServiceProviders::class);
        $this->loadRoutesFrom(__DIR__ . '/../Routes/course_routes.php');
        $this->loadRoutesFrom(__DIR__ . '/../Routes/season_routes.php');
        $this->loadRoutesFrom(__DIR__ . '/../Routes/lesson_routes.php');
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views','course');
    }

    public function register()
    {
        Gate::before(function ($user){
            return $user->hasRole('super_admin')?true : null;
        });
        Gate::policy(course::class,CoursePolicy::class);
        Gate::policy(Lesson::class,LessonPolicy::class);
        Gate::policy(Season::class,SeasonPolicy::class);
    }

}
