<?php

namespace App\Policies;

use App\Models\User;
use App\Models\CritereImmeuble;
use Illuminate\Auth\Access\HandlesAuthorization;

class CritereImmeublePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the critereImmeuble can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list critereimmeubles');
    }

    /**
     * Determine whether the critereImmeuble can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CritereImmeuble  $model
     * @return mixed
     */
    public function view(User $user, CritereImmeuble $model)
    {
        return $user->hasPermissionTo('view critereimmeubles');
    }

    /**
     * Determine whether the critereImmeuble can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create critereimmeubles');
    }

    /**
     * Determine whether the critereImmeuble can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CritereImmeuble  $model
     * @return mixed
     */
    public function update(User $user, CritereImmeuble $model)
    {
        return $user->hasPermissionTo('update critereimmeubles');
    }

    /**
     * Determine whether the critereImmeuble can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CritereImmeuble  $model
     * @return mixed
     */
    public function delete(User $user, CritereImmeuble $model)
    {
        return $user->hasPermissionTo('delete critereimmeubles');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CritereImmeuble  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete critereimmeubles');
    }

    /**
     * Determine whether the critereImmeuble can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CritereImmeuble  $model
     * @return mixed
     */
    public function restore(User $user, CritereImmeuble $model)
    {
        return false;
    }

    /**
     * Determine whether the critereImmeuble can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CritereImmeuble  $model
     * @return mixed
     */
    public function forceDelete(User $user, CritereImmeuble $model)
    {
        return false;
    }
}
