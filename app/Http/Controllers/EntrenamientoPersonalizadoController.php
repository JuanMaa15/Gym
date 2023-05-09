<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompletarEntrenamientoPersonalizadoRequest;
use App\Http\Requests\StoreEntrenamientoPersonalizadoRequest;
use App\Models\Cliente;
use App\Models\EntrenamientoPersonalizado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EntrenamientoPersonalizadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', EntrenamientoPersonalizado::class);

        //Traer los entrenamientos que pertenecen al instructor
        $entrenamientos_personalizados = EntrenamientoPersonalizado::join('horas', 'entrenamientos_personalizados.hora_id', '=', 'horas.id')
                                                    ->where('horas.personal_id', Auth::guard('personal')->user()->id)
                                                    ->get();

        return view('entrenamiento_personalizado.index', compact('entrenamientos_personalizados'));
    }

    public function indexCliente() 
    {
        $this->authorize('viewAnyCliente', EntrenamientoPersonalizado::class);

        $entrenamientos_personalizados = EntrenamientoPersonalizado::where('cliente_id', Auth::user()->id)
                                                                    ->orderBy('fecha', 'asc')                                                            
                                                                    ->paginate(5);

        return view('entrenamiento_personalizado.index_cliente', compact('entrenamientos_personalizados'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $this->authorize('create', EntrenamientoPersonalizado::class);

        return view('entrenamiento_personalizado.create');
    }

    public function completar(CompletarEntrenamientoPersonalizadoRequest $request, $fecha)
    {
        $this->authorize('create', EntrenamientoPersonalizado::class);

        $hora = $request->input('hora');

        return view('entrenamiento_personalizado.completar', compact('fecha', 'hora'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEntrenamientoPersonalizadoRequest $request)
    {
        $this->authorize('create', EntrenamientoPersonalizado::class);

        $validated = $request->validated();
        $validated['cliente_id'] = Auth::user()->id;

        EntrenamientoPersonalizado::create($validated);

        return redirect()->route('entrenamiento_personalizado.create')
                        ->with('status', 'La reserva se registro correctamente, recuerda llevar el costo del entrenamiento');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(EntrenamientoPersonalizado $entrenamiento_personalizado)
    {
        $this->authorize('view', [EntrenamientoPersonalizado::class, $entrenamiento_personalizado]);

        return view('entrenamiento_personalizado.show', compact('entrenamiento_personalizado'));
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
    public function destroy(EntrenamientoPersonalizado $entrenamiento_personalizado)
    {
        $this->authorize('view', [EntrenamientoPersonalizado::class, $entrenamiento_personalizado]);

        $entrenamiento_personalizado->delete();

        return redirect()->route('entrenamiento_personalizado.index')->with('status', 'El entrenamiento se eliminó correctamente');
    }
}
