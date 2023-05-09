@extends('layouts.app')

@section('content')

    <!-- barra lateral -->
    <section id="profile" class="py-5">
        <div class="container">
            <div class="row">
                <!-- Barra lateral -->
                <div class="col-sm-12 col-md-12 col-lg-3 border-end">

               
                    <img src="{{ Auth::user()->imagen ? route('imagen.show', Auth::user()->imagen) : asset('images/perfil.jpg') }}" class="img-fluid">

                    <form action="{{ Auth::guard('personal')->user() ? route('imagen.update', 'personal') : route('imagen.update', 'web') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="file" class="form-control @error('imagen') is-invalid @enderror" name="imagen" id="imagen">
                        @error('imagen')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <input type="submit" class="btn btn-primary mt-3" value="Agregar foto">
                    </form>
                    <div class="menu-lateral py-4">
                        @if (Auth::guard('personal')->user())
                            <ul>
                                <li>
                                    <a href="{{ route('instructores.edit', Auth::guard('personal')->user() )}}" class="nav-link">Datos personales</a>
                                </li>
                                {{-- <li>
                                    <a href="" class="nav-link">Planes de alimentación</a>
                                </li> --}}
                            </ul>
                        @else
                            <ul>
                                <li>
                                    <a href="{{ Auth::user() ? route('clientes.edit', ['cliente' => Auth::user()]) : '' }}" class="nav-link">Datos personales</a>
                                </li>
                                <li>
                                    <a href="{{ route('planes_adquiridos.showClientes', ['cliente_id' => Auth::user()->id]) }}" class="nav-link">Planes adquiridos</a>
                                </li>
                                <li>
                                    <a href="{{ route('planes_alimenticios.showClientes', ['cliente_id' => Auth::user()->id]) }}" class="nav-link">Planes de alimentación</a>
                                </li>
                                <li>
                                    <a href="{{ route('entrenamiento_personalizado.index_cliente') }}" class="nav-link">Entrenamientos personalizados</a>
                                </li>
                            </ul>
                        @endif
                    </div>
                </div>

                <div class="col-sm-12 col-md-12 col-lg-9">
                    
                    @yield('content_profile')

                </div>
                
            </div>
        </div>
    </section>

    
@endsection