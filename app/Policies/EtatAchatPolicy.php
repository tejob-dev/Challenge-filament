<?php

namespace App\Policies;

use App\Models\User;
use App\Models\EtatAchat;
use Illuminate\Auth\Access\HandlesAuthorization;

class EtatAchatPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the etatAchat can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list etatachats');
    }

    /**
     * Determine whether the etatAchat can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\EtatAchat  $model
     * @return mixed
     */
    public function view(User $user, EtatAchat $model)
    {
        return $user->hasPermissionTo('view etatachats');
    }

    /**
     * Determine whether the etatAchat can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create etatachats');
    }

    /**
     * Determine whether the etatAchat can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\EtatAchat  $model
     * @return mixed
     */
    public function update(User $user, EtatAchat $model)
    {
        return $user->hasPermissionTo('update etatachats');
    }

    /**
     * Determine whether the etatAchat can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\EtatAchat  $model
     * @return mixed
     */
    public function delete(User $user, EtatAchat $model)
    {
        return $user->hasPermissionTo('delete etatachats');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\EtatAchat  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete etatachats');
    }

    /**
     * Determine whether the etatAchat can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\EtatAchat  $model
     * @return mixed
     */
    public function restore(User $user, EtatAchat $model)
    {
        return false;
    }

    /**
     * Determine whether the etatAchat can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\EtatAchat  $model
     * @return mixed
     */
    public function forceDelete(User $user, EtatAchat $model)
    {
        return false;
    }
}
