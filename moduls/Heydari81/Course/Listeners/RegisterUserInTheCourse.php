<?php

namespace Heydari81\Course\Listeners;

use Heydari81\Course\Models\course;
use Heydari81\Course\Repositories\CourseRepo;

class RegisterUserInTheCourse
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
            (new CourseRepo())->addStudentToCourse($event->payment->paymentable,$event->payment->buyer_id);
    }
}
