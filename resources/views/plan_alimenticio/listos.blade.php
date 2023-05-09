@extends('layouts.servicios')

@section('content-services')
     
        <div class="row">
            <div class="col">
                <h2 class="titulo text-center">Planes alimenticios por realizar</h2>
            </div>
        </div>
        <div class="row">
            @if (session('status'))
                <div class="col pb-4">
                    <div class="alert alert-success">
                         {{ session('status') }}
                    </div>
                </div>
            @endif
        </div>
        <div class="row py-4 justify-content-center">
            @foreach ($planes_alimenticios as $plan_alimenticio)
                
                <div class="col-sm-12 col-md-6 col-lg-6 pb-3">
                    <div class="card">
                        <div class="card-header">
                            Plan de alimentacion
                        </div>
                        <div class="card-body">
                            <p class="card-title">Cliente: {{ $plan_alimenticio->solicitudesPlanesAlimenticios->clientes->nombre. ' ' . $plan_alimenticio->solicitudesPlanesAlimenticios->clientes->apellido }}</p>

                            <p class="card-text">Descripcion del plan : {{ $plan_alimenticio->descripcion }}</p>
                        
                            <p class="card-text"> Fecha inicio: {{ $plan_alimenticio->fecha_inicio }} - Fecha fin {{ $plan_alimenticio->fecha_fin }}</p>
                        </div>
                        <div class="card-footer d-flex">
                            <a href="{{ route('planes_alimenticios.show_listo', $plan_alimenticio) }}" class="btn btn-sm btn-success me-3">Detalle</a>
                            <form action="{{ route('planes_alimenticios.destroy', $plan_alimenticio) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
                
            @endforeach
        </div>

@endsection 