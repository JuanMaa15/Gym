<?php

namespace App\Policies;

use App\Models\Personal;
use App\Models\Publicacion;
use App\Models\Rol;
use Illuminate\Auth\Access\HandlesAuthorization;

class PublicacionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\Personal  $personal
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(Personal $personal)
    {
        return auth('personal')->check() && $personal->tiposPersonal->rol_id == Rol::admin;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Personal  $personal
     * @param  \App\Models\Publicacion  $publicacion
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Personal $personal, Publicacion $publicacion)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Personal  $personal
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(Personal $personal)
    {
        return auth('personal')->check() && $personal->tiposPersonal->rol_id == Rol::admin;

    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Personal  $personal
     * @param  \App\Models\Publicacion  $publicacion
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Personal $personal, Publicacion $publicacion)
    {
        return auth('personal')->check() 
                && $personal->tiposPersonal->rol_id == Rol::admin
                && $personal->id == $publicacion->personal_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Personal  $personal
     * @param  \App\Models\Publicacion  $publicacion
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Personal $personal, Publicacion $publicacion)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Personal  $personal
     * @param  \App\Models\Publicacion  $publicacion
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Personal $personal, Publicacion $publicacion)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Personal  $personal
     * @param  \App\Models\Publicacion  $publicacion
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Personal $personal, Publicacion $publicacion)
    {
        //
    }
}
