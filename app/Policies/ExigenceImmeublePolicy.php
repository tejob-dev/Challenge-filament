<?php

namespace App\Policies;

use App\Models\User;
use App\Models\ExigenceImmeuble;
use Illuminate\Auth\Access\HandlesAuthorization;

class ExigenceImmeublePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the exigenceImmeuble can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list exigenceimmeubles');
    }

    /**
     * Determine whether the exigenceImmeuble can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ExigenceImmeuble  $model
     * @return mixed
     */
    public function view(User $user, ExigenceImmeuble $model)
    {
        return $user->hasPermissionTo('view exigenceimmeubles');
    }

    /**
     * Determine whether the exigenceImmeuble can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create exigenceimmeubles');
    }

    /**
     * Determine whether the exigenceImmeuble can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ExigenceImmeuble  $model
     * @return mixed
     */
    public function update(User $user, ExigenceImmeuble $model)
    {
        return $user->hasPermissionTo('update exigenceimmeubles');
    }

    /**
     * Determine whether the exigenceImmeuble can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ExigenceImmeuble  $model
     * @return mixed
     */
    public function delete(User $user, ExigenceImmeuble $model)
    {
        return $user->hasPermissionTo('delete exigenceimmeubles');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ExigenceImmeuble  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete exigenceimmeubles');
    }

    /**
     * Determine whether the exigenceImmeuble can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ExigenceImmeuble  $model
     * @return mixed
     */
    public function restore(User $user, ExigenceImmeuble $model)
    {
        return false;
    }

    /**
     * Determine whether the exigenceImmeuble can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ExigenceImmeuble  $model
     * @return mixed
     */
    public function forceDelete(User $user, ExigenceImmeuble $model)
    {
        return false;
    }
}
