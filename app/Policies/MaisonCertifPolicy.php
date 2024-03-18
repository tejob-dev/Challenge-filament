<?php

namespace App\Policies;

use App\Models\User;
use App\Models\MaisonCertif;
use Illuminate\Auth\Access\HandlesAuthorization;

class MaisonCertifPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the maisonCertif can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list maisoncertifs');
    }

    /**
     * Determine whether the maisonCertif can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\MaisonCertif  $model
     * @return mixed
     */
    public function view(User $user, MaisonCertif $model)
    {
        return $user->hasPermissionTo('view maisoncertifs');
    }

    /**
     * Determine whether the maisonCertif can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create maisoncertifs');
    }

    /**
     * Determine whether the maisonCertif can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\MaisonCertif  $model
     * @return mixed
     */
    public function update(User $user, MaisonCertif $model)
    {
        return $user->hasPermissionTo('update maisoncertifs');
    }

    /**
     * Determine whether the maisonCertif can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\MaisonCertif  $model
     * @return mixed
     */
    public function delete(User $user, MaisonCertif $model)
    {
        return $user->hasPermissionTo('delete maisoncertifs');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\MaisonCertif  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete maisoncertifs');
    }

    /**
     * Determine whether the maisonCertif can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\MaisonCertif  $model
     * @return mixed
     */
    public function restore(User $user, MaisonCertif $model)
    {
        return false;
    }

    /**
     * Determine whether the maisonCertif can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\MaisonCertif  $model
     * @return mixed
     */
    public function forceDelete(User $user, MaisonCertif $model)
    {
        return false;
    }
}
