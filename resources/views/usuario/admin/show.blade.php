@extends('layouts.admin')

@section('content')

    <section id="dashboard-admin" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="titulo">Perfil: {{ $admin->nombre }}</h2>
                </div>
            </div>
        
            <div class="row justify-content-center">
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <img src="{{ $admin->imagen ? route('imagen.show', ['nombre_imagen' => $admin->imagen]) : asset('images/perfil.jpg') }}" class="img-fluid">
                    <ul>
                        <li>ID: {{ $admin->id }}</li>
                        <li>Nombre: {{ $admin->nombre }}</li>
                        <li>Apellido: {{ $admin->apellido }}</li>
                        <li>Telefono: {{ $admin->telefono }}</li>
                        <li>Email: {{ $admin->email }}</li>
                        <li>Descripcion: {{ $admin->descripcion }}</li>
                        <li>Tipo de personal: {{ $admin->tiposPersonal->tipo }}</li>
                    </ul>
                </div>
            </div>  
        </div>
    </section>

@endsection