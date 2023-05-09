@extends('layouts.servicios')

@section('content-services')

    <div class="row">
        <div class="col">
            <h2 class="titulo text-center">Entrenamientos personalizados</h2>
        </div>
    </div>
    <div class="row py-4 justify-content-center">
        <div class="col-sm-12 col-md-12 col-lg-8">
            <p class="h3 text-center pb-4">Seleccionar instructor</p>
            <form action="{{ route('horas.horas_disponibles', $fecha) }}" method="GET">
                
                <div class="row justify-content-center">
                    @foreach ($instructores as $instructor)
                        @if ($instructor->tiposPersonal->rol_id == 1 && $instructor->tiposPersonal->id == 2)
                            
                            <div class="col-sm-12 col-md-12 col-lg-6 mb-4">
                                <div class="card">
                                    <div class="card">
                                        <img src="{{ $instructor->imagen ? route('imagen.show', ['nombre_imagen' => $instructor->imagen]) : asset('images/perfil.jpg') }}" class="card-img-top img-instructor">
                                        <div class="card-body">
                                            <p class="card-title">{{ $instructor->nombre . ' ' . $instructor->nombre }}</p>
                                            <p class="card-text">{{ $instructor->descripcion }}</p>
                                            <button type="submit" value="{{ $instructor->id }}" name="instructor" class="btn btn-primary">Seleccionar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach

                </div>
            </form>
        </div>
    </div>

@endsection