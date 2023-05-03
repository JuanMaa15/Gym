@extends('layouts.config')

@section('content_profile')

   
    <div class="row">
        <div class="col">
            <h2 class="titulo text-center">Historial de inscripciones</h2>
        </div>
    </div>

    @if (session('status'))
        <div class="row">
            <div class="col">
                <div class="alert alert-success">{{ session('status') }}</div>
            </div>
        </div>
    @endif
    <div class="row py-4 justify-content-center">
        <div class="col-sm-12 col-md-12 col-lg-10">

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Plan</th>
                        <th scope="col">Dias</th>
                        <th scope="col">Fecha inicio</th>
                        <th scope="col">Fecha fin</th>
                        <th scope="col">Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($planes_adquiridos as $plan_adquirido)
                        <tr>
                            <td>{{ $plan_adquirido->planes->plan }}</td>
                            <td>{{ $plan_adquirido->planes->dias }}</td>
                            <td>{{ $plan_adquirido->fecha_inicio }}</td>
                            <td>{{ $plan_adquirido->fecha_fin }}</td>
                            <td>{{ $plan_adquirido->estados->estado }}</td>
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col d-flex justify-content-center">
            {{-- Si no hay ningun plan activo permitir mostrar el boton para crear uno --}}
            @if (!$plan_adquirido_activo)
                <a href="{{ route('planes_adquiridos.create') }}" class="btn btn-primary">Nuevo plan</a>
            @endif
        </div>
    </div>

@endsection