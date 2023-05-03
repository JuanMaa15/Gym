@extends('layouts.admin')

@section('content')

    <section id="dashboard-admin" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="titulo">Clientes</h2>
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
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Email</th>
                            <th scope="col">Estado</th>
                            <th scope="col" colspan="3" class="text-center">Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($clientes as $cliente)
                            <tr>
                                <td>{{ $cliente->id }}</td>
                                <td>{{ $cliente->nombre }}</td>
                                <td>{{ $cliente->apellido }}</td>
                                <td>{{ $cliente->telefono }}</td>
                                <td>{{ $cliente->email }}</td>
                                <td>{{ $cliente->estados->estado }}</td>
                                @if ($cliente->estado_id == 2) 
                                    <td>
                                        <form action="{{ route('clientes.update_estado', $cliente) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" value="{{ $cliente->id }}" class="btn btn-sm btn-primary">Activar</button>
                                        </form>
                                    </td>
                                @endif
                                <td><a href="{{ route('clientes.show', $cliente) }}" class="btn btn-sm btn-success">Detalle</a></td>
                                <td>
                                    <form action="{{ route('clientes.destroy', $cliente) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" value="{{ $cliente->id }}" class="btn btn-sm btn-danger">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $clientes->links() }}
                </div>
            </div>
        </div>
    </section>

@endsection