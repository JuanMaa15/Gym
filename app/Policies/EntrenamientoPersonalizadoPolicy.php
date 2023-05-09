<?php

namespace App\Policies;

use App\Models\Cliente;
use App\Models\EntrenamientoPersonalizado;
use App\Models\Estado;
use App\Models\Personal;
use App\Models\Rol;
use App\Models\TipoPersonal;
use Illuminate\Auth\Access\HandlesAuthorization;

class EntrenamientoPersonalizadoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(Personal $personal)
    {
        return auth('personal')->check() 
            && $personal->tiposPersonal->rol_id == Rol::instructor
            && $personal->tiposPersonal->id == TipoPersonal::personalizado;
    }

    public function viewAnyCliente(Cliente $cliente)
    {
        return auth()->check() && $cliente->estado_id == Estado::activo; 
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Cliente  $cliente
     * @param  \App\Models\EntrenamientoPersonalizado  $entrenamientoPersonalizado
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Personal $personal, EntrenamientoPersonalizado $entrenamientoPersonalizado)
    {
        return auth('personal')->check() 
            && $personal->tiposPersonal->rol_id == Rol::instructor
            && $personal->tiposPersonal->id == TipoPersonal::personalizado
            && $personal->id == $entrenamientoPersonalizado->horas->personal->id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(Cliente $cliente)
    {
        return auth()->check() && $cliente->estado_id == Estado::activo;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Cliente  $cliente
     * @param  \App\Models\EntrenamientoPersonalizado  $entrenamientoPersonalizado
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Cliente $cliente, EntrenamientoPersonalizado $entrenamientoPersonalizado)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Cliente  $cliente
     * @param  \App\Models\EntrenamientoPersonalizado  $entrenamientoPersonalizado
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Personal $personal, EntrenamientoPersonalizado $entrenamientoPersonalizado)
    {
        return auth('personal')->check() 
            && $personal->tiposPersonal->rol_id == Rol::instructor
            && $personal->tiposPersonal->id == TipoPersonal::personalizado
            && $personal->id == $entrenamientoPersonalizado->horas->personal->id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Cliente  $cliente
     * @param  \App\Models\EntrenamientoPersonalizado  $entrenamientoPersonalizado
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Cliente $cliente, EntrenamientoPersonalizado $entrenamientoPersonalizado)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Cliente  $cliente
     * @param  \App\Models\EntrenamientoPersonalizado  $entrenamientoPersonalizado
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Cliente $cliente, EntrenamientoPersonalizado $entrenamientoPersonalizado)
    {
        //
    }
}
