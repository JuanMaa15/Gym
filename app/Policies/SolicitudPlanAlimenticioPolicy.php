<?php

namespace App\Policies;

use App\Models\Cliente;
use App\Models\Estado;
use App\Models\Personal;
use App\Models\Rol;
use Illuminate\Auth\Access\HandlesAuthorization;

class SolicitudPlanAlimenticioPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function create(Cliente $cliente) {
        return auth()->check() && $cliente->estado_id == Estado::activo;
    }

    public function viewAdmin(Personal $personal) {
        return auth('personal')->check() && $personal->tiposPersonal->rol_id == Rol::admin;
    }

}
