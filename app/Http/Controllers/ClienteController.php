<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateClienteRequest;
use App\Models\Cliente;
use App\Models\PlanAdquirido;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAdmin', Cliente::class);

        $clientes = Cliente::paginate(10);

        return view('usuario.cliente.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([ 'plan_id' => 'required|integer' ]);
        $plan_id = $request->input('plan_id');

        return view('usuario.cliente.create', compact('plan_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        $this->authorize('viewAdmin', Cliente::class);

        return view('usuario.cliente.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        $this->authorize('update', [Cliente::class, $cliente]);

        return view('usuario.perfil.update', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClienteRequest $request, Cliente $cliente)
    {
        $this->authorize('update', [Cliente::class, $cliente]);

        $cliente->update($request->validated());

        return back()->with('status', 'Sus datos se actualizaron correctamente!');
    }

    public function updateEstado(Cliente $cliente)
    {
        $this->authorize('viewAdmin', Cliente::class);

        $cliente->update(['estado_id' => 1]);

        //Buscar el plan adquirido
        $planAdquirido = PlanAdquirido::where('cliente_id', $cliente->id)->first();

        //Actualizar las fechas de inicio y fin del plan adquirido (el primero)
        $planAdquirido->update([
            'fecha_inicio' => Carbon::today(),
            'fecha_fin' => Carbon::today()->addDays( $planAdquirido->planes->dias)
        ]);

        return redirect()->route('clientes.index')->with('status', 'El cliente se activó correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();

        return back()->with('status', 'El cliente se eliminó correctamente!');
    }

}
