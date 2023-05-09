@extends('layouts.servicios')

@section('content-services')

    <div class="row">
        <div class="col">
            <h2 class="titulo text-center">Entrenamientos personalizados</h2>
        </div>
    </div>
    <div class="row py-4 justify-content-center">
        <div class="col-sm-12 col-md-12 col-lg-8">
            <p class="h3 text-center pb-4">Registrar entrenamiento</p>
            <form action="{{ route('entrenamiento_personalizado.store') }}" method="POST">
                @csrf
                <input type="hidden" value="{{ $fecha }}" name="fecha">
                <input type="hidden" value="{{ $hora }}" name="hora_id">
                <div class="py-2">
                    <label for="incapacidades" class="form-label">Incapacidades</label>
                    <input type="text" id="incapacidades" name="incapacidades" class="form-control @error('incapacidades') is-invalid @enderror" >
                    @error('incapacidades')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="py-2">
                    <label for="descripcion" class="form-label">Que entrenamiento deseas y cual es tu objetivo?</label>
                    <textarea id="descripcion" name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" ></textarea>
                    @error('descripcion')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="py-2">
                    <input type="submit" class="btn btn-primary" value="Enviar">
                </div>
            </form>
        </div>
    </div>

@endsection