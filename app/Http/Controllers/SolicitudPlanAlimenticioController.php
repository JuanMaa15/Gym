<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSolicitudPlanAlimenticioRequest;
use App\Models\SolicitudPlanAlimenticio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SolicitudPlanAlimenticioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAdmin', SolicitudPlanAlimenticio::class);

        $solicitudes_planes_alimenticios = SolicitudPlanAlimenticio::where('asignado', 0)
                                                                    ->paginate(10);

        return view('solicitud_plan_alimenticio.index', compact('solicitudes_planes_alimenticios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', SolicitudPlanAlimenticio::class);

        return view('solicitud_plan_alimenticio.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSolicitudPlanAlimenticioRequest $request)
    {
        $this->authorize('create', SolicitudPlanAlimenticio::class);

        $validated = $request->validated();
        $validated['cliente_id'] = Auth::user()->id;
        $validated['asignado'] = 0;

        SolicitudPlanAlimenticio::create($validated);

        return back()->with('status', 'Tu plan de alimentación se envió correctamente!');
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
