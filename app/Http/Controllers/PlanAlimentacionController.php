<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePlanAlimentacionRequest;
use App\Models\Personal;
use App\Models\PlanAlimenticio;
use App\Models\SolicitudPlanAlimenticio;
use Illuminate\Http\Request;

class PlanAlimentacionController extends Controller
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
    public function create($solicitud_plan_alimenticio_id)
    {
        $this->authorize('create', PlanAlimenticio::class);

        $personal = Personal::all();

        return view('plan_alimenticio.create', compact('solicitud_plan_alimenticio_id', 'personal'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlanAlimentacionRequest $request)
    {
        $this->authorize('create', PlanAlimenticio::class);

        $validated = $request->validated();
        $validated['estado_id'] = 2;

        PlanAlimenticio::create($validated);

        //Actualizar la columna "asignado" por 1 (true) del registro 
        //perteneciente a este plan en "solicitudes_planes_alimenticios" 
        $solicitud_plan_alimenticio = SolicitudPlanAlimenticio::find($request->input('solicitud_plan_alimenticio_id'));
        $solicitud_plan_alimenticio->update(['asignado' => 1]);

        return redirect()->route('solicitud_plan_alimenticio.index')->with('status', 'El plan alimenticio fue asignado correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    //Me trae los planes de alvimentacion de un cliente
    public function showClientes($cliente_id)
    {   
        $this->authorize('showClientes', [PlanAlimenticio::class, $cliente_id]);

        // Traerme los planes alimenticios que le pertenezcan al cliente
        $planes_alimenticios = PlanAlimenticio::join('solicitudes_planes_alimenticios', 'planes_alimenticios.solicitud_plan_alimenticio_id', '=', 'solicitudes_planes_alimenticios.id')
                                                ->where('cliente_id', $cliente_id)
                                                ->orderBy('planes_alimenticios.id', 'DESC')
                                                ->get();
        

        return view('usuario.perfil.planes_alimentacion', compact('planes_alimenticios'));
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
