<?php

namespace App\Policies;

use App\Models\Cliente;
use App\Models\EntrenamientoPersonalizado;
use App\Models\Estado;
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
    public function viewAny(Cliente $cliente)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Cliente  $cliente
     * @param  \App\Models\EntrenamientoPersonalizado  $entrenamientoPersonalizado
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Cliente $cliente, EntrenamientoPersonalizado $entrenamientoPersonalizado)
    {
        //
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
    public function delete(Cliente $cliente, EntrenamientoPersonalizado $entrenamientoPersonalizado)
    {
        //
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
