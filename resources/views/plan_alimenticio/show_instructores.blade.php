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
           
            <div class="col-12">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Edad</th>
                        <th scope="col">Fecha inicio</th>
                        <th scope="col">Fecha fin</th>
                        <th scope="col" colspan="2" class="text-center">Opciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($planes_alimenticios as $plan_alimenticio)
                        
                            <tr>
                                <td>{{ $plan_alimenticio->solicitudesPlanesAlimenticios->clientes->nombre }}</td>
                                <td>{{ $plan_alimenticio->solicitudesPlanesAlimenticios->clientes->telefono }}</td>
                                <td>{{ $plan_alimenticio->solicitudesPlanesAlimenticios->edad }}</td>
                                <td>{{ $plan_alimenticio->fecha_inicio }}</td>
                                <td>{{ $plan_alimenticio->fecha_fin }}</td>

                                <td><a href="{{ route('planes_alimenticios.completar', $plan_alimenticio) }}" class="btn btn-sm btn-success">Iniciar</a></td>
                                <td>
                                    <form action="{{ route('planes_alimenticios.destroy', $plan_alimenticio) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" value="{{ $plan_alimenticio->id }}" class="btn btn-sm btn-danger">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $planes_alimenticios->links() }}
            </div>
        </div>

@endsection 