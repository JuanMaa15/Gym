@extends('layouts.admin')

@section('content')

    <section id="dashboard-admin" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="titulo">Perfil: {{ $instructore->nombre }}</h2>
                </div>
            </div>
        
            <div class="row justify-content-center">
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <img src="{{ $instructore->imagen ? route('imagen.show', ['nombre_imagen' => $instructore->imagen]) : asset('images/perfil.jpg') }}" class="img-fluid">
                    <ul>
                        <li>ID: {{ $instructore->id }}</li>
                        <li>Nombre: {{ $instructore->nombre }}</li>
                        <li>Apellido: {{ $instructore->apellido }}</li>
                        <li>Telefono: {{ $instructore->telefono }}</li>
                        <li>Email: {{ $instructore->email }}</li>
                        <li>Descripcion: {{ $instructore->descripcion }}</li>
                        <li>Tipo de personal: {{ $instructore->tiposPersonal->tipo }}</li>
                    </ul>
                </div>
            </div>  
        </div>
    </section>

@endsection