<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePublicacionRequest;
use App\Models\Publicacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File as FacadesFile;
use Illuminate\Support\Facades\Storage;

class PublicacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Publicacion::class);

        $publicaciones = Publicacion::paginate(10);

        return view('publicacion.index', compact('publicaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Publicacion::class);

        return view('publicacion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePublicacionRequest $request)
    {
        $this->authorize('create', Publicacion::class);

        $imagen = $request->file('imagen');
        $descripcion = $request->input('descripcion');

        //Imagen
        $nombre_imagen = time().$imagen->getClientOriginalName();
        //Guardar en la carpeta storage
        Storage::disk('publicaciones')->put($nombre_imagen, FacadesFile::get($imagen));

        //Crear
        Publicacion::create([
            'descripcion' => $descripcion,
            'imagen' => $nombre_imagen,
            'personal_id' => Auth::guard('personal')->user()->id
        ]);

        return redirect()->route('publicaciones.index')->with('status', 'La publicación se ha creado correctamente');
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
    public function edit(Publicacion $publicacione)
    {   

        $this->authorize('update', [Publicacion::class, $publicacione]);

        return view('publicacion.update', compact('publicacione'));
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
    public function destroy(Publicacion $publicacione)
    {   
        
        $publicacione->delete();

        return back()->with('status', 'La publicación se eliminó correctamente');
    }
}
