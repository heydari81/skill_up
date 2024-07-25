<?php

namespace Heydari81\Course\Policies;

use Heydari81\User\Models\User;

class LessonPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
    public function index_policy(User $user)
    {
        return ($user->hasRole('manager') || $user->hasRole('teacher'));
    }
    public function store_policy(User $user)
    {
        return ($user->hasRole('manager')  || $user->hasRole('teacher'));
    }
    public function edit_policy(User $user)
    {
        // to do
        return ($user->hasRole('manager')  || $user->hasRole('teacher'));
    }
    public function delete_policy(User $user)
    {
        return ($user->hasRole('manager')  || $user->hasRole('teacher'));
    }
    public function updateConfirmStatus_policy(User $user)
    {
        return ($user->hasRole('manager')  || $user->hasRole('teacher'));
    }
}
