<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Cliente;
use App\Models\EntrenamientoPersonalizado;
use App\Models\Estado;
use App\Models\Personal;
use App\Models\SolicitudPlanAlimenticio;
use App\Policies\EntrenamientoPersonalizadoPolicy;
use App\Policies\PersonalPolicy;
use App\Policies\SolicitudPlanAlimenticioPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        //EntrenamientoPersonalizado::class => EntrenamientoPersonalizadoPolicy::class 
        SolicitudPlanAlimenticio::class => SolicitudPlanAlimenticioPolicy::class
      
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        

        //

        //Gate::define('create', function(Cliente $cliente) { return auth()->check() && $cliente->estado_id == Estado::activo;  });

    }
}
