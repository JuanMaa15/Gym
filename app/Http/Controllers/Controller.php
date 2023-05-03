<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    use AuthorizesRequests {
        authorize as protected baseAuthorize;
    }

    //Agregar guard para los policies con la autenticación del personal
    public function authorize($ability, $arguments = [])
    {
        if (Auth::guard('personal')->check()) {
            Auth::shouldUse('personal');
        }

        $this->baseAuthorize($ability, $arguments);
    }
}
