@extends('layouts.servicios')

@section('content-services')
     
        <div class="row">
            <div class="col">
                <h2 class="titulo text-center">Planes alimenticios por realizar</h2>
            </div>
        </div>
        <div class="row py-4 justify-content-center">
            @if (session('status'))
                <div class="col-12 pb-4">
                    <div class="alert alert-success">
                         {{ session('status') }}
                    </div>
                </div>
            @endif
            <div class="col-sm-12 col-md-12 col-lg-10 pb-5">
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
                    </div>
                    <div class="card-footer">
                        Fecha inicio - Fecha fin
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-8">
                <p class="h3 text-center pb-4">Iniciar plan</p>
                <form action="{{ route('planes_alimenticios.iniciar', $plan_alimenticio) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="py-2">
                        <label for="fecha_inicio" class="form-label">Fecha inicio</label>
                        <input type="date" id="fecha_inicio" name="fecha_inicio" class="form-control @error('fecha_inicio') is-invalid @enderror" >
                        @error('fecha_inicio')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="py-2">
                        <label for="fecha_fin" class="form-label">Fecha fin</label>
                        <input type="date" id="fecha_fin" name="fecha_fin" class="form-control @error('fecha_fin') is-invalid @enderror">
                        @error('fecha_fin')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>    
             
                    <div class="py-2">
                        <label for="descripcion" class="form-label">Descripcion</label>
                        <textarea type="text" id="descripcion" name="descripcion" class="form-control @error('descripcion') is-invalid @enderror"></textarea>
                        @error('descripcion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div> 

                    <div class="py-2">
                        <input type="submit" class="btn btn-primary" value="Enviar">
                    </div>
                </form>
            </div>
        </div>

@endsection 