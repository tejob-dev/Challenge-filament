<?php

namespace App\Policies;

use App\Models\User;
use App\Models\AcheteNow;
use Illuminate\Auth\Access\HandlesAuthorization;

class AcheteNowPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the acheteNow can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list achetenows');
    }

    /**
     * Determine whether the acheteNow can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\AcheteNow  $model
     * @return mixed
     */
    public function view(User $user, AcheteNow $model)
    {
        return $user->hasPermissionTo('view achetenows');
    }

    /**
     * Determine whether the acheteNow can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create achetenows');
    }

    /**
     * Determine whether the acheteNow can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\AcheteNow  $model
     * @return mixed
     */
    public function update(User $user, AcheteNow $model)
    {
        return $user->hasPermissionTo('update achetenows');
    }

    /**
     * Determine whether the acheteNow can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\AcheteNow  $model
     * @return mixed
     */
    public function delete(User $user, AcheteNow $model)
    {
        return $user->hasPermissionTo('delete achetenows');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\AcheteNow  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete achetenows');
    }

    /**
     * Determine whether the acheteNow can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\AcheteNow  $model
     * @return mixed
     */
    public function restore(User $user, AcheteNow $model)
    {
        return false;
    }

    /**
     * Determine whether the acheteNow can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\AcheteNow  $model
     * @return mixed
     */
    public function forceDelete(User $user, AcheteNow $model)
    {
        return false;
    }
}
