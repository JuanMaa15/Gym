@extends('layouts.admin')

@section('content')

    <section id="index-publicacion" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="titulo">Publicaciones</h2>
                </div>
            </div>
            <div class="row pb-3">
                <div class="col">
                    <a href="{{ route('publicaciones.create') }}" class="btn btn-primary">Nueva publicación</a>
                </div>
            </div>
            @if ( session('status') )
                <div class="row">
                    <div class="col">
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    </div>
                </div>
            @endif
            <div class="row mb-5">
                @foreach ($publicaciones as $publicacion)    
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                {{ $publicacion->personal->nombre . ' ' . $publicacion->personal->apellido}}
                            </div>
                            <div class="card-body">
                                @if ($publicacion->imagen)
                                    <img src="{{ route('imagen.show_publicacion', $publicacion->imagen) }}" class="card-img publicacion">
                                @endif
                                <p class="text-muted">{{ $publicacion->created_at }}</p>
                                <p>{{ $publicacion->descripcion }}</p>
                            </div>
                            @if ($publicacion->personal->id == Auth::guard('personal')->user()->id)
                                <div class="card-footer d-flex">
                                    <a href="{{ route('publicaciones.edit', $publicacion) }}" class="btn btn-success">Editar</a>
                                    <form action="{{ route('publicaciones.destroy', $publicacion) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="btn btn-danger ms-2" value="Eliminar">
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
                {{-- {{ $publicaciones->links() }} --}}
            </div>
        </div>
    </section>

@endsection