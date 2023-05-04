<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdminRequest;
use App\Models\Cliente;
use App\Models\Estado;
use App\Models\Personal;
use App\Models\Publicacion;
use App\Models\Rol;
use App\Models\TipoPersonal;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAdmin', Personal::class);

        $admins = Personal::paginate(10);

        return view('usuario.admin.index', compact('admins'));
    }

    public function home()
    {
        $this->authorize('viewAdmin', Personal::class);

        //Traer clientes que sean nuevos durante 7 días 
        $clientes = Cliente::where('estado_id', Estado::activo)
                        ->whereBetween('created_at', [Carbon::now()->subDays(7), Carbon::now()])
                        ->orderBy('created_at', 'DESC')
                        ->paginate('5');

        //Traer instructores que sean nuevos durante 15 días 
        $personal = Personal::whereBetween('created_at', [Carbon::now()->subDays(15), Carbon::now()])
                            ->orderBy('created_at', 'DESC')
                            ->paginate('5');

        $publicaciones = Publicacion::limit(2)
                             ->orderBy('id', 'DESC')
                            ->get();

        return view('usuario.admin.panel', compact('clientes', 'personal', 'publicaciones'));
    }

    public function gestion()
    {
        $this->authorize('viewAdmin', Personal::class);

        return view('usuario.admin.gestion');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Personal::class);

        $tiposPersonal = TipoPersonal::where('rol_id', Rol::admin)->get();

        return view('usuario.admin.create', compact('tiposPersonal'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdminRequest $request)
    {
        $this->authorize('create', Personal::class);

        $validated = $request->validated();
        $validated['password'] = Hash::make($request->input('password'));

        Personal::create($validated);

        return redirect()->route('admins.index')->with('status', 'El administrador se registro correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Personal $admin)
    {
        $this->authorize('viewAdmin', Personal::class);
    
        return view('usuario.admin.show', compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Personal $admin)
    {
        $this->authorize('updateAdmin', [Personal::class, $admin]);

        $tipos_personal = TipoPersonal::where('rol_id', Rol::admin)->get();

        return view('usuario.admin.update', compact('admin', 'tipos_personal'));
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
    public function destroy(Personal $admin)
    {
        $admin->delete();

        return back()->with('status', 'El administrador se eliminó correctamente!');
    }
}
