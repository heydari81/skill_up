<?php

namespace Heydari81\Category\Policies;

use Heydari81\User\Models\User;

class CategoryPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function category_policy(User $user)
    {
        return ($user->hasRole('manager'));

    }
}
