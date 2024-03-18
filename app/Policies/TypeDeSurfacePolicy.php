<?php

namespace App\Policies;

use App\Models\User;
use App\Models\TypeDeSurface;
use Illuminate\Auth\Access\HandlesAuthorization;

class TypeDeSurfacePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the typeDeSurface can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list typedesurfaces');
    }

    /**
     * Determine whether the typeDeSurface can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TypeDeSurface  $model
     * @return mixed
     */
    public function view(User $user, TypeDeSurface $model)
    {
        return $user->hasPermissionTo('view typedesurfaces');
    }

    /**
     * Determine whether the typeDeSurface can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create typedesurfaces');
    }

    /**
     * Determine whether the typeDeSurface can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TypeDeSurface  $model
     * @return mixed
     */
    public function update(User $user, TypeDeSurface $model)
    {
        return $user->hasPermissionTo('update typedesurfaces');
    }

    /**
     * Determine whether the typeDeSurface can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TypeDeSurface  $model
     * @return mixed
     */
    public function delete(User $user, TypeDeSurface $model)
    {
        return $user->hasPermissionTo('delete typedesurfaces');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TypeDeSurface  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete typedesurfaces');
    }

    /**
     * Determine whether the typeDeSurface can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TypeDeSurface  $model
     * @return mixed
     */
    public function restore(User $user, TypeDeSurface $model)
    {
        return false;
    }

    /**
     * Determine whether the typeDeSurface can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TypeDeSurface  $model
     * @return mixed
     */
    public function forceDelete(User $user, TypeDeSurface $model)
    {
        return false;
    }
}
