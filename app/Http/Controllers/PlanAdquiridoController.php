<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePlanAdquiridoRequest;
use App\Models\Estado;
use App\Models\Plan;
use App\Models\PlanAdquirido;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlanAdquiridoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', PlanAdquirido::class);

        $planes = Plan::all(); 

        return view('planes_adquiridos.create', compact('planes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlanAdquiridoRequest $request)
    {   
        $this->authorize('create', PlanAdquirido::class);

        //Buscar el plan seleccionado
        $plan = Plan::find( $request->input('plan_id') );

        PlanAdquirido::create([
            'cliente_id' => Auth::user()->id,
            'plan_id' => $request->input('plan_id'),
            'fecha_inicio' => Carbon::today(), // Me trae la fecha de hoy
            'fecha_fin' => Carbon::today()->addDays( $plan->dias ), // Me trae la fecha de vencimiento del plan
            'estado_id' => 1
        ]);

        return redirect()->route('planes_adquiridos.showClientes', ['cliente_id' => Auth::user()->id])
                        ->with('status', 'El nuevo plan se registro correctamente');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(PlanAdquirido $planes_adquiridos)
    {   
        return view('usuario.perfil.historial_planes', compact('planes_adquiridos'));
    }

    //Me trae los planes adquiridos de un cliente
    public function showClientes($cliente_id)
    {   

        $this->authorize('showClientes', [PlanAdquirido::class, $cliente_id]);

        $planes_adquiridos = PlanAdquirido::where('cliente_id', $cliente_id)
                                            ->orderBy('id', 'DESC')
                                            ->get();
        
        //Traer un plan adquirido si este esta activo
        $plan_adquirido_activo = PlanAdquirido::where('cliente_id', $cliente_id)
                                            ->where('estado_id', Estado::activo)
                                            ->first();

        return view('usuario.perfil.historial_planes', compact('planes_adquiridos', 'plan_adquirido_activo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
