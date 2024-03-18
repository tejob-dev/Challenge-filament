<?php

namespace App\Policies;

use App\Models\User;
use App\Models\TerrainCertif;
use Illuminate\Auth\Access\HandlesAuthorization;

class TerrainCertifPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the terrainCertif can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list terraincertifs');
    }

    /**
     * Determine whether the terrainCertif can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TerrainCertif  $model
     * @return mixed
     */
    public function view(User $user, TerrainCertif $model)
    {
        return $user->hasPermissionTo('view terraincertifs');
    }

    /**
     * Determine whether the terrainCertif can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create terraincertifs');
    }

    /**
     * Determine whether the terrainCertif can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TerrainCertif  $model
     * @return mixed
     */
    public function update(User $user, TerrainCertif $model)
    {
        return $user->hasPermissionTo('update terraincertifs');
    }

    /**
     * Determine whether the terrainCertif can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TerrainCertif  $model
     * @return mixed
     */
    public function delete(User $user, TerrainCertif $model)
    {
        return $user->hasPermissionTo('delete terraincertifs');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TerrainCertif  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete terraincertifs');
    }

    /**
     * Determine whether the terrainCertif can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TerrainCertif  $model
     * @return mixed
     */
    public function restore(User $user, TerrainCertif $model)
    {
        return false;
    }

    /**
     * Determine whether the terrainCertif can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TerrainCertif  $model
     * @return mixed
     */
    public function forceDelete(User $user, TerrainCertif $model)
    {
        return false;
    }
}
