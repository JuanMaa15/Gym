<?php

namespace App\Policies;

use App\Models\Cliente;
use App\Models\Personal;
use App\Models\PlanAlimenticio;
use App\Models\Rol;
use Illuminate\Auth\Access\HandlesAuthorization;

class PlanAlimenticioPolicy
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

    public function view(Cliente $cliente, PlanAlimenticio $planAlimenticio)
    {
        //
    }
   
    public function viewInstructor(Personal $personal, PlanAlimenticio $planAlimenticio)
    {
        return auth('personal')->check() 
                && $personal->tiposPersonal->rol_id == Rol::instructor
                && $personal->id == $planAlimenticio->personal_id;
    }

    public function showCliente(Cliente $cliente, $id) {
        return auth()->check() && $cliente->id == $id;
    }


    public function showInstructor(Personal $personal, $id) {
        return auth('personal')->check() 
                && $personal->tiposPersonal->rol_id == Rol::instructor
                && $personal->id == $id;
    }

    public function create(Personal $personal)
    {
        return auth('personal')->check() && $personal->tiposPersonal->rol_id == Rol::admin;
    }

    
    public function update(Personal $personal, PlanAlimenticio $planAlimenticio)
    {
        return auth('personal')->check() 
                && $personal->tiposPersonal->rol_id == Rol::instructor
                && $personal->id == $planAlimenticio->personal_id;
    }

    public function delete(Personal $personal, PlanAlimenticio $planAlimenticio)
    {
        return auth('personal')->check() 
                && $personal->tiposPersonal->rol_id == Rol::instructor
                && $personal->id == $planAlimenticio->personal_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Cliente  $cliente
     * @param  \App\Models\PlanAlimenticio  $planAlimenticio
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Cliente $cliente, PlanAlimenticio $planAlimenticio)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Cliente  $cliente
     * @param  \App\Models\PlanAlimenticio  $planAlimenticio
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Cliente $cliente, PlanAlimenticio $planAlimenticio)
    {
        //
    }
}
