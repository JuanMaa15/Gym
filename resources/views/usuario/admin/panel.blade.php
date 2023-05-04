@extends('layouts.admin')

@section('content')

    <section id="dashboard-admin" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="titulo">Panel - Administrador</h2>
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
                <div class="col-12 h4">Cliente nuevos</div>
                <div class="col-12">
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

            <div class="row mb-2">
                <div class="col-12 h4">Instructores nuevos</div>
                <div class="col-12">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Email</th>
                            <th scope="col">Personal</th>
                            <th scope="col" colspan="3" class="text-center">Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($personal as $instructor)
                            @if($instructor->tiposPersonal->rol_id == 1)
                                <tr>
                                    <td>{{ $instructor->id }}</td>
                                    <td>{{ $instructor->nombre }}</td>
                                    <td>{{ $instructor->apellido }}</td>
                                    <td>{{ $instructor->telefono }}</td>
                                    <td>{{ $instructor->email }}</td>
                                    <td>{{ $instructor->tiposPersonal->tipo }}</td>

                                    <td><a href="{{ route('instructores.show', $instructor) }}" class="btn btn-sm btn-success">Detalle</a></td>
                                    <td>
                                        <form action="{{ route('instructores.destroy', $instructor) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" value="{{ $instructor->id }}" class="btn btn-sm btn-danger">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-12 h4">Administradores nuevos</div>
                <div class="col-12">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Email</th>
                            <th scope="col">Personal</th>
                            <th scope="col" colspan="3" class="text-center">Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($personal as $admin)
                            @if($admin->tiposPersonal->rol_id == 2)
                                <tr>
                                    <td>{{ $admin->id }}</td>
                                    <td>{{ $admin->nombre }}</td>
                                    <td>{{ $admin->apellido }}</td>
                                    <td>{{ $admin->telefono }}</td>
                                    <td>{{ $admin->email }}</td>
                                    <td>{{ $admin->tiposPersonal->tipo }}</td>
        
                                    <td><a href="{{ route('admins.show', $admin) }}" class="btn btn-sm btn-success">Detalle</a></td>
                                    <td>
                                        <form action="{{ route('admins.destroy', $admin) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" value="{{ $admin->id }}" class="btn btn-sm btn-danger">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                    
                    {{ $personal->links() }}
                </div>
            </div>

            
            <div class="row justify-content-center">
                <div class="col-12 h4">Noticias recientes</div>
                @foreach ($publicaciones as $publicacion)    
                    <div class="col-sm-12 col-md-12 col-lg-8 pb-5">
                        <div class="card">
                            <div class="card-header">
                                {{ $publicacion->personal->nombre . ' ' . $publicacion->personal->apellido}}
                            </div>
                            <div class="card-body">
                                @if ($publicacion->imagen)
                                    <img src="{{ route('imagen.show_publicacion', $publicacion->imagen) }}" class="card-img publicacion">
                                @endif
                                <p class="text-muted">{{ $publicacion->created_at }}</p>
                                <p>{{ $publicacion->descripcion }}</p>
                            </div>
                            @if ($publicacion->personal->id == Auth::guard('personal')->user()->id)
                                <div class="card-footer d-flex">
                                    <a href="{{ route('publicaciones.edit', $publicacion) }}" class="btn btn-success">Editar</a>
                                    <form action="{{ route('publicaciones.destroy', $publicacion) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="btn btn-danger ms-2" value="Eliminar">
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
                
            </div>
        </div>
    </section>

@endsection