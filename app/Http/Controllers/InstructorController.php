<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInstructorRequest;
use App\Models\Personal;
use App\Models\Rol;
use App\Models\TipoPersonal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAdmin', Personal::class);

        $instructores = Personal::paginate(10);

        return view('usuario.instructor.index', compact('instructores'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Personal::class);

        $tiposPersonal = TipoPersonal::where('rol_id', Rol::instructor)->get();

        return view('usuario.instructor.create', compact('tiposPersonal'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInstructorRequest $request)
    {
        $this->authorize('create', Personal::class);

        $validated = $request->validated();
        $validated['password'] = Hash::make($request->input('password'));

        Personal::create($validated);

        return redirect()->route('instructores.index')->with('status', 'El instructor se registro correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Personal $instructore)
    {
        $this->authorize('viewAdmin', Personal::class);
    

        return view('usuario.instructor.show', compact('instructore'));
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
    public function destroy(Personal $instructore)
    {   
        $instructore->delete();

        return back()->with('status', 'El instructor se elimino correctamente!');
    }
}