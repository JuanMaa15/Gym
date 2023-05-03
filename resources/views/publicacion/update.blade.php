@extends('layouts.admin')

@section('content')

    <section id="publicacione" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="titulo">Editar publicación</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col">
                    <!-- Formulario -->
                    <form action="{{ route('publicaciones.update', $publicacione) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row justify-content-center">
                            <div class="col-sm-12 col-md-12 col-lg-6">

                                <div class="py-2">
                                    <label for="descripcion" class="form-label">Descripción</label>
                                    <input type="text" id="descripcion" name="descripcion" value="{{ $publicacione->descripcion }}" class="form-control @error('descripcion') is-invalid @enderror">
                                    @error('descripcion')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="py-2">
                                    <img src="{{ route('imagen.show_publicacion', $publicacione->imagen) }}" class="card-img">
                                </div>
                                <div class="py-2">
                                    <label for="imagen" class="form-label">Imagen</label>
                                    <input type="file" id="imagen" name="imagen" class="form-control @error('imagen') is-invalid @enderror" >
                                    @error('imagen')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="py-2">
                                    <input type="submit" value="Enviar" class="btn btn-primary" >
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
          
        </div>
    </section>

@endsection