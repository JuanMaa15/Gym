<?php

namespace App\Policies;

use App\Models\Cliente;
use App\Models\Estado;
use App\Models\PlanAdquirido;
use Illuminate\Auth\Access\HandlesAuthorization;

class PlanAdquiridoPolicy
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
     * @param  \App\Models\PlanAdquirido  $planAdquirido
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Cliente $cliente, PlanAdquirido $plan_adquirido)
    {
        //return auth()->check() && $cliente->id == $plan_adquirido->cliente_id;
    }

    public function showClientes(Cliente $cliente, $id) {
        return auth()->check() && $cliente->id == $id;
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
     * @param  \App\Models\PlanAdquirido  $planAdquirido
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Cliente $cliente, PlanAdquirido $planAdquirido)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Cliente  $cliente
     * @param  \App\Models\PlanAdquirido  $planAdquirido
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Cliente $cliente, PlanAdquirido $planAdquirido)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Cliente  $cliente
     * @param  \App\Models\PlanAdquirido  $planAdquirido
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Cliente $cliente, PlanAdquirido $planAdquirido)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Cliente  $cliente
     * @param  \App\Models\PlanAdquirido  $planAdquirido
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Cliente $cliente, PlanAdquirido $planAdquirido)
    {
        //
    }
}
