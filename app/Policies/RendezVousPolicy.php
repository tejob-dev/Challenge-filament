<?php

namespace App\Policies;

use App\Models\User;
use App\Models\RendezVous;
use Illuminate\Auth\Access\HandlesAuthorization;

class RendezVousPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the rendezVous can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list allrendezvous');
    }

    /**
     * Determine whether the rendezVous can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\RendezVous  $model
     * @return mixed
     */
    public function view(User $user, RendezVous $model)
    {
        return $user->hasPermissionTo('view allrendezvous');
    }

    /**
     * Determine whether the rendezVous can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create allrendezvous');
    }

    /**
     * Determine whether the rendezVous can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\RendezVous  $model
     * @return mixed
     */
    public function update(User $user, RendezVous $model)
    {
        return $user->hasPermissionTo('update allrendezvous');
    }

    /**
     * Determine whether the rendezVous can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\RendezVous  $model
     * @return mixed
     */
    public function delete(User $user, RendezVous $model)
    {
        return $user->hasPermissionTo('delete allrendezvous');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\RendezVous  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete allrendezvous');
    }

    /**
     * Determine whether the rendezVous can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\RendezVous  $model
     * @return mixed
     */
    public function restore(User $user, RendezVous $model)
    {
        return false;
    }

    /**
     * Determine whether the rendezVous can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\RendezVous  $model
     * @return mixed
     */
    public function forceDelete(User $user, RendezVous $model)
    {
        return false;
    }
}
