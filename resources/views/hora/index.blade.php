@extends('layouts.servicios')

@section('content-services')
     
        <div class="row">
            <div class="col">
                <h2 class="titulo text-center">Horas</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-6 col-lg-6">
                <a href="{{ route('horas.create') }}" class="btn btn-primary">Nueva hora</a>
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
           
            <div class="col-sm-12 col-md-6 col-lg-6">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Hora</th>
                    
                        <th scope="col" colspan="2" class="text-center">Opciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($horas as $hora)
                        
                            <tr>
                                <td>{{ $hora->hora }}</td>
                                <td><a href="{{ route('horas.edit', $hora) }}" class="btn btn-sm btn-success">Editar</a></td>
                                <td>
                                    <form action="{{ route('horas.destroy', $hora) }}" method="POST">
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