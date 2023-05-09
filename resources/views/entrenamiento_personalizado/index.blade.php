@extends('layouts.servicios')

@section('content-services')
     
        <div class="row">
            <div class="col">
                <h2 class="titulo text-center">Entrenamientos personalizados</h2>
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
                        <th scope="col">Apellido</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Hora</th>
                        <th scope="col" colspan="2" class="text-center">Opciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($entrenamientos_personalizados as $entrenamiento_personalizado)
                        
                            <tr>
                                <td>{{ $entrenamiento_personalizado->clientes->nombre }}</td>
                                <td>{{ $entrenamiento_personalizado->clientes->apellido }}</td>
                                <td>{{ $entrenamiento_personalizado->clientes->telefono }}</td>
                                <td>{{ $entrenamiento_personalizado->fecha }}</td>
                                <td>{{ $entrenamiento_personalizado->horas->hora }}</td>
                                <td><a href="{{ route('entrenamiento_personalizado.show', $entrenamiento_personalizado) }}" class="btn btn-sm btn-success">Detalle</a></td>
                                <td>
                                    <form action="{{ route('entrenamiento_personalizado.destroy', $entrenamiento_personalizado) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                    @endforeach
                    </tbody>
                </table>
              
            </div>
        </div>

@endsection 