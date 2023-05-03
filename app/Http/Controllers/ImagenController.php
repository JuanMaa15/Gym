<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ImagenController extends Controller
{
    
    public function update(Request $request) {

        $validate = $request->validate([
            'imagen' => ['required','image']
        ]);

        $imagen = $request->file('imagen');

        $nombre_imagen = time().$imagen->getClientOriginalName();

        //Guardar en la carpeta storage
        Storage::disk('users')->put($nombre_imagen, File::get($imagen));

        $request->user()->update([
            'imagen' => $nombre_imagen
        ]);

        return back()->with('status', 'Imagen actualizada correctamente!');

    }

    public function show ($nombre_imagen) {

        // Traer
        $imagen = Storage::disk('users')->get($nombre_imagen);

        // Devolver imagen
        return response($imagen, 200);
    }

    public function showPublicacion ($nombre_imagen) {

        // Traer
        $imagen = Storage::disk('publicaciones')->get($nombre_imagen);

        // Devolver imagen
        return response($imagen, 200);
    }

}
