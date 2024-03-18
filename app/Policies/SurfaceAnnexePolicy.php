<?php

namespace App\Policies;

use App\Models\User;
use App\Models\SurfaceAnnexe;
use Illuminate\Auth\Access\HandlesAuthorization;

class SurfaceAnnexePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the surfaceAnnexe can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list surfaceannexes');
    }

    /**
     * Determine whether the surfaceAnnexe can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\SurfaceAnnexe  $model
     * @return mixed
     */
    public function view(User $user, SurfaceAnnexe $model)
    {
        return $user->hasPermissionTo('view surfaceannexes');
    }

    /**
     * Determine whether the surfaceAnnexe can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create surfaceannexes');
    }

    /**
     * Determine whether the surfaceAnnexe can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\SurfaceAnnexe  $model
     * @return mixed
     */
    public function update(User $user, SurfaceAnnexe $model)
    {
        return $user->hasPermissionTo('update surfaceannexes');
    }

    /**
     * Determine whether the surfaceAnnexe can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\SurfaceAnnexe  $model
     * @return mixed
     */
    public function delete(User $user, SurfaceAnnexe $model)
    {
        return $user->hasPermissionTo('delete surfaceannexes');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\SurfaceAnnexe  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete surfaceannexes');
    }

    /**
     * Determine whether the surfaceAnnexe can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\SurfaceAnnexe  $model
     * @return mixed
     */
    public function restore(User $user, SurfaceAnnexe $model)
    {
        return false;
    }

    /**
     * Determine whether the surfaceAnnexe can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\SurfaceAnnexe  $model
     * @return mixed
     */
    public function forceDelete(User $user, SurfaceAnnexe $model)
    {
        return false;
    }
}
