<?php

namespace App\Policies;

use App\Models\User;
use App\Models\ExigenceParticuliere;
use Illuminate\Auth\Access\HandlesAuthorization;

class ExigenceParticulierePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the exigenceParticuliere can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list exigenceparticulieres');
    }

    /**
     * Determine whether the exigenceParticuliere can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ExigenceParticuliere  $model
     * @return mixed
     */
    public function view(User $user, ExigenceParticuliere $model)
    {
        return $user->hasPermissionTo('view exigenceparticulieres');
    }

    /**
     * Determine whether the exigenceParticuliere can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create exigenceparticulieres');
    }

    /**
     * Determine whether the exigenceParticuliere can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ExigenceParticuliere  $model
     * @return mixed
     */
    public function update(User $user, ExigenceParticuliere $model)
    {
        return $user->hasPermissionTo('update exigenceparticulieres');
    }

    /**
     * Determine whether the exigenceParticuliere can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ExigenceParticuliere  $model
     * @return mixed
     */
    public function delete(User $user, ExigenceParticuliere $model)
    {
        return $user->hasPermissionTo('delete exigenceparticulieres');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ExigenceParticuliere  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete exigenceparticulieres');
    }

    /**
     * Determine whether the exigenceParticuliere can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ExigenceParticuliere  $model
     * @return mixed
     */
    public function restore(User $user, ExigenceParticuliere $model)
    {
        return false;
    }

    /**
     * Determine whether the exigenceParticuliere can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ExigenceParticuliere  $model
     * @return mixed
     */
    public function forceDelete(User $user, ExigenceParticuliere $model)
    {
        return false;
    }
}
