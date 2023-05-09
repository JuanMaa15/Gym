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
            <form action="{{ Auth::guard('personal')->user() ? route('instructores.update', Auth::guard('personal')->user()) : route('clientes.update', Auth::user()) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="py-2">
                    <label for="id" class="form-label">Numero de identificacion</label>
                    <input type="text" id="id" name="id" class="form-control" value="{{ $instructore->id ?? $cliente->id }}" disabled>
                </div>
                <div class="py-2">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" id="nombre" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ $instructore->nombre ?? $cliente->nombre }}" >
                    @error('nombre')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="py-2">
                    <label for="apellido" class="form-label">Apellido</label>
                    <input type="text" id="apellido" name="apellido" class="form-control @error('apellido') is-invalid @enderror" value="{{ $instructore->apellido ?? $cliente->apellido }}">
                    @error('apellido')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="py-2">
                    <label for="telefono" class="form-label">Telefono</label>
                    <input type="text" id="telefono" name="telefono" class="form-control @error('telefono') is-invalid @enderror" value="{{ $instructore->telefono ?? $cliente->telefono }}">
                    @error('telefono')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>    

                @if (Auth::guard('personal')->user())
                    <div class="py-2">
                        <label for="descripcion" class="form-label">Descripcion</label>
                        <textarea type="text" id="descripcion" name="descripcion" class="form-control @error('descripcion') is-invalid @enderror">{{ $instructore->descripcion }}</textarea>
                        @error('descripcion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div> 
                    <div class="py-2">
                        <label for="tipo_personal_id" class="form-label">Tipo de personal</label>
                        <select  id="tipo_personal_id" name="tipo_personal_id" class="form-select @error('tipo_personal_id') is-invalid @enderror" disabled>
                            <option>Seleccionar tipo de personal</option>
                            @foreach ($tipos_personal as $tipo_personal)
                                <option value="{{ $tipo_personal->id }}" {{ $tipo_personal->id == $instructore->tiposPersonal->id ? 'selected' : '' }}>{{ $tipo_personal->tipo }}</option>
                            @endforeach
                        </select>
                        @error('tipo_personal_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div> 
                @endif

                <div class="py-2">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ $instructore->email ?? $cliente->email }}">
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
            <form action="{{ Auth::guard('personal')->user() ? route('password_update_personal') : route('password_update') }}" method="POST">
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