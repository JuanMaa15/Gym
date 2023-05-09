@extends('layouts.app')

@section('content')

    <!-- barra lateral -->
    <section id="servicios" class="py-5">
        <div class="container">
            <div class="row py-5">
                <!-- Barra lateral -->
                <div class="col-sm-12 col-md-12 col-lg-3 border-end">
                    <h2 class="titulo text-center">Servicios</h2>

                    
                    <div class="menu-lateral py-4">
                        <ul>
                            @if(Auth::guard('personal')->user())

                                @if(Auth::guard('personal')->user()->tiposPersonal->id == 3)
                                    <li>
                                        <a href="{{ route('planes_alimenticios.show_instructores', Auth::guard('personal')->user()->id) }}" class="nav-link">Planes alimenticios por realizar</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('planes_alimenticios.listos', Auth::guard('personal')->user()->id) }}" class="nav-link">Planes alimenticios listos</a>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{ route('horas.index') }}" class="nav-link">Horas de entrenamientos</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('entrenamiento_personalizado.index') }}" class="nav-link">Entrenamientos personalizados</a>
                                    </li>
                                @endif
                                
                            @else
                                <li>
                                    <a href="{{ route('entrenamiento_personalizado.create') }}" class="nav-link">Entrenamientos personalizados</a>
                                </li>
                                <li>
                                    <a href="{{ route('solicitud_plan_alimenticio.create') }}" class="nav-link">Solicitar plan alimenticio</a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link">Enviar comentario</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>


                <div class="col-sm-12 col-md-12 col-lg-9">

                    @yield('content-services')
                   
                </div>
                
            </div>
        </div>
    </section>

@endsection