<?php

namespace Heydari81\Course\Providers;

use Heydari81\Course\Listeners\RegisterUserInTheCourse;
use Heydari81\Payment\Events\SuccessPayment;
use Illuminate\Foundation\Support\Providers\EventServiceProvider;

class EventServiceProviders extends EventServiceProvider
{
    protected $listen = [
        SuccessPayment::class=> [
            RegisterUserInTheCourse::class,
        ]
    ];
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
