@extends('layouts.admin')

@section('content')

    <section id="dashboard-admin" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="titulo">Perfil: {{ $cliente->nombre }}</h2>
                </div>
            </div>
        
            <div class="row justify-content-center">
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <img src="{{ $cliente->imagen ? route('imagen.show', ['nombre_imagen' => $cliente->imagen]) : asset('images/perfil.jpg') }}" class="img-fluid">
                    <ul>
                        <li>ID: {{ $cliente->id }}</li>
                        <li>Nombre: {{ $cliente->nombre }}</li>
                        <li>Apellido: {{ $cliente->apellido }}</li>
                        <li>Telefono: {{ $cliente->telefono }}</li>
                        <li>Email: {{ $cliente->email }}</li>
                        <li>Estado: {{ $cliente->estados->estado }}</li>
                    </ul>
                </div>
            </div>  
        </div>
    </section>

@endsection