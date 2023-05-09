<?php

namespace App\Policies;

use App\Models\Cliente;
use App\Models\Estado;
use App\Models\Hora;
use App\Models\Personal;
use App\Models\Rol;
use App\Models\TipoPersonal;
use Illuminate\Auth\Access\HandlesAuthorization;

class HoraPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\Personal  $personal
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAnyCliente(Cliente $cliente)
    {
        return auth()->check() 
            && $cliente->estado_id == Estado::activo;
        
    }

    public function viewAny(Personal $personal)
    {
        return auth('personal')->check() 
            && $personal->tiposPersonal->rol_id == Rol::instructor
            && $personal->tiposPersonal->id == TipoPersonal::personalizado;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Personal  $personal
     * @param  \App\Models\Hora  $hora
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Personal $personal, Hora $hora)
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
        return auth('personal')->check() 
            && $personal->tiposPersonal->rol_id == Rol::instructor
            && $personal->tiposPersonal->id == TipoPersonal::personalizado;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Personal  $personal
     * @param  \App\Models\Hora  $hora
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Personal $personal, Hora $hora)
    {
        return auth('personal')->check() 
            && $personal->tiposPersonal->rol_id == Rol::instructor
            && $personal->tiposPersonal->id == TipoPersonal::personalizado
            && $personal->id == $hora->personal_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Personal  $personal
     * @param  \App\Models\Hora  $hora
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Personal $personal, Hora $hora)
    {
        return auth('personal')->check() 
            && $personal->tiposPersonal->rol_id == Rol::instructor
            && $personal->tiposPersonal->id == TipoPersonal::personalizado
            && $personal->id == $hora->personal_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Personal  $personal
     * @param  \App\Models\Hora  $hora
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Personal $personal, Hora $hora)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Personal  $personal
     * @param  \App\Models\Hora  $hora
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Personal $personal, Hora $hora)
    {
        //
    }
}
