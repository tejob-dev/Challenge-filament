<?php

namespace App\Policies;

use App\Models\User;
use App\Models\TypeCertification;
use Illuminate\Auth\Access\HandlesAuthorization;

class TypeCertificationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the typeCertification can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list typecertifications');
    }

    /**
     * Determine whether the typeCertification can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TypeCertification  $model
     * @return mixed
     */
    public function view(User $user, TypeCertification $model)
    {
        return $user->hasPermissionTo('view typecertifications');
    }

    /**
     * Determine whether the typeCertification can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create typecertifications');
    }

    /**
     * Determine whether the typeCertification can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TypeCertification  $model
     * @return mixed
     */
    public function update(User $user, TypeCertification $model)
    {
        return $user->hasPermissionTo('update typecertifications');
    }

    /**
     * Determine whether the typeCertification can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TypeCertification  $model
     * @return mixed
     */
    public function delete(User $user, TypeCertification $model)
    {
        return $user->hasPermissionTo('delete typecertifications');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TypeCertification  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete typecertifications');
    }

    /**
     * Determine whether the typeCertification can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TypeCertification  $model
     * @return mixed
     */
    public function restore(User $user, TypeCertification $model)
    {
        return false;
    }

    /**
     * Determine whether the typeCertification can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TypeCertification  $model
     * @return mixed
     */
    public function forceDelete(User $user, TypeCertification $model)
    {
        return false;
    }
}
