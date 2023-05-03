@extends('layouts.admin')

@section('content')

    <section id="dashboard-admin" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="titulo">Instructores</h2>
                </div>
            </div>
            <div class="row pb-3">
                <div class="col">
                    <a href="{{ route('instructores.create') }}" class="btn btn-primary">Nuevo instructor</a>
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
                        @foreach ($instructores as $instructor)
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
                    {{ $instructores->links() }}
                </div>
            </div>
        </div>
    </section>

@endsection