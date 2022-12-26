<?php

namespace App\Policies;

use App\Constants\UserTypes;
use App\Models\User;
use App\Models\Feature;
use Illuminate\Auth\Access\HandlesAuthorization;

class FeaturePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the feature index.
     *
     * @param User $user
     * @return bool
     */
    public function before(User $user)
    {
        // check if the user is not admin return false before access any rolls
        if (!$user->isTypeOf(UserTypes::ADMIN)) {
            return false;
        }
    }

    /**
     * Determine whether the user can view the feature index.
     *
     * @param User $user
     * @return bool
     */
    public function index(User $user)
    {
        return $user->hasAccess("admin.features.index");
    }

    /**
     * Determine whether the user can update the feature.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Feature  $feature
     * @return mixed
     */
    public function update(User $user, Feature $feature)
    {
        return $user->hasAccess("admin.features.update");
    }

}
