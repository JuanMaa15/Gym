@extends('layouts.admin')

@section('content')

    <section id="dashboard-admin" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="titulo">Perfil</h2>
                </div>
            </div>
            @if (session('status'))
            <div class="row">
                <div class="col">
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                </div>
            </div>
            @endif
            <div class="row py-4 justify-content-center">
                <div class="col-sm-12 col-md-6 col-lg-3 pb-4">
                    <img src="{{ $admin->imagen ? route('imagen.show', $admin->imagen) : asset('images/perfil.jpg') }}" class="img-fluid admin-perfil">
                    <form action="{{ route('imagen.update', 'personal') }}" method="post" enctype="multipart/form-data">
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
                </div>
                <div class="col-sm-12 col-md-12 col-lg-8 pb-4">
                    <p class="h3 text-center pb-2">Modificar datos</p>
                    <form action="{{ route('admins.update', $admin) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="py-2">
                            <label for="id" class="form-label">Numero de identificacion</label>
                            <input type="text" id="id" name="id" class="form-control" value="{{ $admin->id }}" disabled>
                        </div>
                        <div class="py-2">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" id="nombre" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ $admin->nombre }}" >
                            @error('nombre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="py-2">
                            <label for="apellido" class="form-label">Apellido</label>
                            <input type="text" id="apellido" name="apellido" class="form-control @error('apellido') is-invalid @enderror" value="{{ $admin->apellido }}">
                            @error('apellido')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="py-2">
                            <label for="telefono" class="form-label">Telefono</label>
                            <input type="text" id="telefono" name="telefono" class="form-control @error('telefono') is-invalid @enderror" value="{{ $admin->telefono }}">
                            @error('telefono')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="py-2">
                            <label for="descripcion" class="form-label">Descripcion</label>
                            <textarea type="text" id="descripcion" name="descripcion" class="form-control @error('telefono') is-invalid @enderror">{{ $admin->descripcion }}</textarea>
                            @error('descripcion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="py-2">
                            <label for="tipo_personal_id" class="form-label">Tipo de personal</label>
                            <select id="tipo_personal_id" name="tipo_personal_id" class="form-select @error('tipo_personal_id') is-invalid @enderror" >
                                <option>Seleccionar tipo de personal</option>
                                @foreach ($tipos_personal as $tipo_personal)
                                    <option value="{{ $tipo_personal->id }}" {{ $tipo_personal->id == $admin->tiposPersonal->id ? 'selected' : '' }}>{{ $tipo_personal->tipo }}</option>
                                @endforeach
                            </select>
                            @error('tipo_personal_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="py-2">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ $admin->email }}">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="py-2">
                            <input type="submit" class="btn btn-primary" value="Guardar">
                        </div>
                    </form>
                </div>
            </div>
        
            <div class="row justify-content-center pb-4">
                <div class="col-sm-12 col-md-12 col-lg-8">
                    <p class="h3 text-center pb-4">Modificar contraseña</p>
                    <form action="{{ route('password_update_personal') }}" method="POST">
                        @csrf
                        
                        <div class="py-2">
                            <label for="current_password" class="form-label">Contraseña actual</label>
                            <input type="password" id="current_password" name="current_password" class="form-control @error('current_password') is-invalid @enderror" >
                            @error('current_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="py-2">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" >
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="py-2">
                            <label for="password_confirmation" class="form-label">Confimar contraseña</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" >
                            @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="py-2">
                            <input type="submit" class="btn btn-primary" value="Guardar">
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </section>

@endsection