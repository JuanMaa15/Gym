

@extends('layouts.admin')

@section('content')

    <section id="dashboard-admin" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="titulo">Nuevo instructor</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col">
                    <!-- Formulario -->
                    <form action="{{ route('instructores.store') }}" method="POST">
                        @csrf
                        <div class="row justify-content-center">
                            <div class="col-sm-12 col-md-12 col-lg-6">

                                <div class="py-2">
                                    <label for="id" class="form-label">Numero de identificacion</label>
                                    <input type="text" id="id" name="id" class="form-control @error('id') is-invalid  @enderror">
                                    @error('id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="py-2">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input type="text" id="nombre" name="nombre" class="form-control @error('nombre') is-invalid @enderror" >
                                    @error('nombre')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="py-2">
                                    <label for="apellido" class="form-label">Apellido</label>
                                    <input type="text" id="apellido" name="apellido" class="form-control @error('apellido') is-invalid @enderror" >
                                    @error('apellido')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="py-2">
                                    <label for="telefono" class="form-label">Telefono</label>
                                    <input type="text" id="telefono" name="telefono" class="form-control @error('telefono') is-invalid @enderror" >
                                    @error('telefono')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>    
                                <div class="py-2">
                                    <label for="descripcion" class="form-label">Descripción</label>
                                    <textarea type="text" id="descripcion" name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" ></textarea>
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
                                        @foreach ($tiposPersonal as $tipoPersonal)
                                            <option value="{{ $tipoPersonal->id }}">{{ $tipoPersonal->tipo }}</option>
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
                                    <input type="text" id="email" name="email" class="form-control @error('apellido') is-invalid @enderror" >
                                    @error('apellido')
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
                                    <input type="submit" value="Enviar" class="btn btn-primary" >
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
          
        </div>
    </section>

@endsection