<?php

namespace App\Policies;

use App\Models\Cliente;
use App\Models\Personal;
use App\Models\Rol;
use Illuminate\Auth\Access\HandlesAuthorization;

class ClientePolicy
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
       return true;
    }

    public function view(Personal $personal, Cliente $datos)
    {   
        
    }

    public function viewAdmin(Personal $personal)
    {
        return auth('personal')->check() && $personal->tiposPersonal->rol_id == Rol::admin;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(Cliente $cliente)
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Cliente  $cliente
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Cliente $cliente, Cliente $datos)
    {
        return auth()->check() && $cliente->id == $datos->id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Cliente  $cliente
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Cliente $cliente, Cliente $datos)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Cliente  $cliente
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Cliente $cliente, Cliente $datos)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Cliente  $cliente
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Cliente $cliente, Cliente $datos)
    {
        //
    }
}
