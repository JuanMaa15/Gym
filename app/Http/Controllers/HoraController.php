<?php

namespace App\Http\Controllers;

use App\Http\Requests\HorasDisponiblesHoraRequest;
use App\Http\Requests\StoreHoraRequest;
use App\Http\Requests\UpdateHoraRequest;
use App\Models\EntrenamientoPersonalizado;
use App\Models\Hora;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HoraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Hora::class);

        $horas = Hora::where('personal_id', Auth::guard('personal')->user()->id)->get();

        return view('hora.index', compact('horas'));
        
    }

    public function horasDisponibles(HorasDisponiblesHoraRequest $request, $fecha)
    {
        $this->authorize('viewAnyCliente', Hora::class);

        $instructor = $request->input('instructor');

        //Traer las horas del instructor
        $horas = Hora::where('personal_id', $instructor)->get();

        //Traer los entrenamientos que pertenecen al instructor
        $entrenamientos_personalizados = EntrenamientoPersonalizado::join('horas', 'entrenamientos_personalizados.hora_id', '=', 'horas.id')
                                                    ->where('horas.personal_id', $instructor)
                                                    ->get();


        return view('hora.horas_disponibles', compact('fecha', 'horas', 'entrenamientos_personalizados'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Hora::class);

        return view('hora.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHoraRequest $request)
    {
        $this->authorize('create', Hora::class);

        $validated = $request->validated();
        $validated['personal_id'] = Auth::guard('personal')->user()->id;

        Hora::create($validated);

        return redirect()->route('horas.index')->with('status', 'La hora se creo correctamente!');
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
    public function edit(Hora $hora)
    {
        
        $this->authorize('update', [Hora::class, $hora]);

        
        return view('hora.update', compact('hora'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHoraRequest $request, Hora $hora)
    {
        $this->authorize('update', [Hora::class, $hora]);

        $hora->update($request->validated());

        return redirect()->route('horas.index')->with('status', 'La hora se actualizó correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hora $hora)
    {
        $this->authorize('delete', [Hora::class, $hora]);

        $hora->delete();

        return redirect()->route('horas.index')->with('status', 'La hora se eliminó correctamente!');
    }
}
