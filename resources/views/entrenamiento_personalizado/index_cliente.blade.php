@extends('layouts.config')

@section('content_profile')

   
    <div class="row">
        <div class="col">
            <h2 class="titulo text-center">Entrenamientos personalizados</h2>
        </div>
    </div>
    <div class="row py-4 justify-content-center">
        @foreach ($entrenamientos_personalizados as $entrenamiento_personalizado)
            <div class="col-sm-12 col-md-12 col-lg-10 pb-5">
                <div class="card">
                    <div class="card-header">
                        Instructor: {{ $entrenamiento_personalizado->horas->personal->nombre . ' ' . $entrenamiento_personalizado->horas->personal->apellido }}
                    </div>
                    <div class="card-body">
                        <p class="card-title">Incapacidades: {{ $entrenamiento_personalizado->incapacidades }}</p>
                        <p class="card-text">Objetivos: {{ $entrenamiento_personalizado->descripcion }}</p>

                    </div>
                    <div class="card-footer">
                         Fecha: {{ $entrenamiento_personalizado->fecha }} 
                    </div>
                </div>
            </div>
        @endforeach
        
    </div>

@endsection