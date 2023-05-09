@extends('layouts.servicios')

@section('content-services')
     
        <div class="row">
            <div class="col">
                <h2 class="titulo text-center"> Hora</h2>
            </div>
        </div>

           
        <div class="row py-4 justify-content-center">
            <div class="col-sm-12 col-md-12 col-lg-8">
                <p class="h3 text-center pb-4">Editar hora</p>
                <form action="{{ route('horas.update', $hora) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="py-2">
                        <label for="hora" class="form-label">Hora</label>
                        <input type="text" id="hora" name="hora" class="form-control @error('hora') is-invalid @enderror" value="{{ $hora->hora }}" >
                        @error('hora')
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