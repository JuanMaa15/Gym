@extends('layouts.admin')

@section('content')

    <section id="dashboard-admin" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="titulo">Solicitudes planes alimenticios</h2>
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
                <div class="col">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Peso</th>
                            <th scope="col">Edad</th>
                            <th scope="col">Alergias</th>
                            <th scope="col">Objetivo</th>
                            <th scope="col" colspan="2" class="text-center">Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($solicitudes_planes_alimenticios as $solicitud_plan_alimenticio)
                            <tr>
                                <td>{{ $solicitud_plan_alimenticio->clientes->nombre }}</td>
                                <td>{{ $solicitud_plan_alimenticio->clientes->apellido }}</td>
                                <td>{{  $solicitud_plan_alimenticio->clientes->telefono }}</td>
                                <td>{{ $solicitud_plan_alimenticio->peso }}</td>
                                <td>{{ $solicitud_plan_alimenticio->edad }}</td>
                                <td>{{ $solicitud_plan_alimenticio->alergias }}</td>
                                <td>{{ $solicitud_plan_alimenticio->objetivo }}</td>
                                <td><a href="{{ route('planes_alimenticios.create', $solicitud_plan_alimenticio->id) }}" class="btn btn-sm btn-success">Asignar</a></td>
                                <td>
                                    <form action="{{ route('planes_alimenticios.destroy', $solicitud_plan_alimenticio) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" value="{{ $solicitud_plan_alimenticio->id }}" class="btn btn-sm btn-danger">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $solicitudes_planes_alimenticios->links() }}
                </div>
            </div>
        </div>
    </section>

@endsection