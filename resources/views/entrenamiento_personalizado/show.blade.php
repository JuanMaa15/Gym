@extends('layouts.servicios')

@section('content-services')
     
        <div class="row">
            <div class="col">
                <h2 class="titulo text-center">Entrenamientos personalizados</h2>
            </div>
        </div>
        <div class="row py-4 justify-content-center">
            <div class="col-sm-12 col-md-8 col-lg-8 pb-3">
                <div class="card">
                    <div class="card-header">
                        Entrenamiento
                    </div>
                    <div class="card-body">
                        <p class="card-title">Cliente: {{ $entrenamiento_personalizado->clientes->nombre. ' ' . $entrenamiento_personalizado->clientes->apellido }}</p>
                        <p class="card-text">Telefono: {{ $entrenamiento_personalizado->clientes->telefono }}</p>
                        <p class="card-text">Incapacidades: {{ $entrenamiento_personalizado->incapacidades}}</p>
                        <p class="card-text">Objetivo: {{ $entrenamiento_personalizado->descripcion}}</p>
                    
                    </div>
                    <div class="card-footer">
                        Fecha: {{ $entrenamiento_personalizado->fecha }} - 
                        Hora: {{ $entrenamiento_personalizado->horas->hora }}
                    </div>
                </div>
            </div>
        </div>

@endsection 