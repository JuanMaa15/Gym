<?php

namespace App\Policies;

use App\Models\Personal;
use App\Models\Rol;
use Illuminate\Auth\Access\HandlesAuthorization;

class PersonalPolicy
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
        //
    }

    public function viewAdmin(Personal $personal) {

        return auth('personal')->check() && auth('personal')->user()->tiposPersonal->rol_id == Rol::admin;
    }

   
    public function view(Personal $personal, Personal $datos)
    {
        return true;
    }


    public function create(Personal $personal)
    {
        return auth('personal')->check() && auth('personal')->user()->tiposPersonal->rol_id == Rol::admin;
        
    }


    public function update(Personal $personal, Personal $datos)
    {
        //
    }


    public function delete(Personal $personal, Personal $datos)
    {
        //
    }

    public function restore(Personal $personal, Personal $datos)
    {
        //
    }


    public function forceDelete(Personal $personal, Personal $datos)
    {
        //
    }
}
