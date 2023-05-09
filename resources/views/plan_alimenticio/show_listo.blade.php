@extends('layouts.servicios')

@section('content-services')
     
        <div class="row">
            <div class="col">
                <h2 class="titulo text-center">Planes alimenticios por realizar</h2>
            </div>
        </div>

        <div class="row py-4 justify-content-center">

                
                <div class="col-sm-12 col-md-6 col-lg-6 pb-3">
                    <div class="card">
                        <div class="card-header">
                            Plan de alimentacion
                        </div>
                        <div class="card-body">
                            <p class="card-title">Cliente: {{ $plan_alimenticio->solicitudesPlanesAlimenticios->clientes->nombre. ' ' . $plan_alimenticio->solicitudesPlanesAlimenticios->clientes->apellido }}</p>
                            <p class="card-text">Edad: {{ $plan_alimenticio->solicitudesPlanesAlimenticios->edad }}</p>
                            <p class="card-text">Peso: {{ $plan_alimenticio->solicitudesPlanesAlimenticios->peso }}</p>
                            <p class="card-text">Alergias: {{ $plan_alimenticio->solicitudesPlanesAlimenticios->alergias }}</p>
                            <p class="card-text">Objetivo: {{ $plan_alimenticio->solicitudesPlanesAlimenticios->objetivo }}</p>

                            <p class="card-text">Descripcion del plan : {{ $plan_alimenticio->descripcion }}</p>
                        
                        </div>
                        <div class="card-footer">
                            Fecha inicio: {{ $plan_alimenticio->fecha_inicio }} - Fecha fin {{ $plan_alimenticio->fecha_fin }}
                        </div>
                    </div>
                </div>
                
       
        </div>

@endsection 