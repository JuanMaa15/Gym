@extends('layouts.config')

@section('content_profile')
    <div class="row">
        <div class="col">
            <h2 class="titulo text-center">Datos personales</h2>
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
        <div class="col-sm-12 col-md-12 col-lg-8">
            <p class="h3 text-center pb-4">Modificar datos</p>
            <form action="{{ route('clientes.update', ['cliente' => Auth::user()]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="py-2">
                    <label for="id" class="form-label">Numero de identificacion</label>
                    <input type="text" id="id" name="id" class="form-control" value="{{ $cliente->id }}" disabled>
                </div>
                <div class="py-2">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" id="nombre" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ $cliente->nombre }}" >
                    @error('nombre')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="py-2">
                    <label for="apellido" class="form-label">Apellido</label>
                    <input type="text" id="apellido" name="apellido" class="form-control @error('apellido') is-invalid @enderror" value="{{ $cliente->apellido }}">
                    @error('apellido')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="py-2">
                    <label for="telefono" class="form-label">Telefono</label>
                    <input type="text" id="telefono" name="telefono" class="form-control @error('telefono') is-invalid @enderror" value="{{ $cliente->telefono }}">
                    @error('telefono')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>    
                <div class="py-2">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ $cliente->email }}">
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
            <form action="{{ route('password_update') }}" method="POST">
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
@endsection