@extends('layouts.admin')

@section('content')

    <section id="dashboard-admin" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="titulo">Administradores</h2>
                </div>
            </div>
            <div class="row pb-3">
                <div class="col">
                    <a href="{{ route('admins.create') }}" class="btn btn-primary">Nuevo administrador</a>
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
                            <th scope="col">Personal</th>
                            <th scope="col" colspan="3" class="text-center">Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($admins as $admin)
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
                    {{ $admins->links() }}
                </div>
            </div>
        </div>
    </section>

@endsection