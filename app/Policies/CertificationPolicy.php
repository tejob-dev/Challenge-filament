<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Certification;
use Illuminate\Auth\Access\HandlesAuthorization;

class CertificationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the certification can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list certifications');
    }

    /**
     * Determine whether the certification can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Certification  $model
     * @return mixed
     */
    public function view(User $user, Certification $model)
    {
        return $user->hasPermissionTo('view certifications');
    }

    /**
     * Determine whether the certification can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create certifications');
    }

    /**
     * Determine whether the certification can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Certification  $model
     * @return mixed
     */
    public function update(User $user, Certification $model)
    {
        return $user->hasPermissionTo('update certifications');
    }

    /**
     * Determine whether the certification can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Certification  $model
     * @return mixed
     */
    public function delete(User $user, Certification $model)
    {
        return $user->hasPermissionTo('delete certifications');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Certification  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete certifications');
    }

    /**
     * Determine whether the certification can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Certification  $model
     * @return mixed
     */
    public function restore(User $user, Certification $model)
    {
        return false;
    }

    /**
     * Determine whether the certification can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Certification  $model
     * @return mixed
     */
    public function forceDelete(User $user, Certification $model)
    {
        return false;
    }
}
