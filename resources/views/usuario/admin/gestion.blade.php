@extends('layouts.admin')

@section('content')

    <section id="dashboard-admin" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="titulo">Gestion</h2>
                </div>
            </div>
        
            <div class="row justify-content-center">
                <div class="col-sm-6 col-md-6 col-lg-4 pb-4">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-title">Clientes</p>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('clientes.index') }}"  class="btn btn-primary">Entrar</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 pb-4">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-title">Instructores</p>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('instructores.index') }}"  class="btn btn-primary">Entrar</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 pb-4">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-title">Administradores</p>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('admins.index') }}"  class="btn btn-primary">Entrar</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 pb-4">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-title">Publicaciones</p>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('publicaciones.index') }}"  class="btn btn-primary">Entrar</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 pb-4">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-title">Solicitud plan alimenticio</p>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('solicitud_plan_alimenticio.index') }}"  class="btn btn-primary">Entrar</a>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>

@endsection