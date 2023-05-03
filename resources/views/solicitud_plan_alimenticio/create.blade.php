@extends('layouts.servicios')

@section('content-services')
     
        <div class="row">
            <div class="col">
                <h2 class="titulo text-center">Plan alimenticio</h2>
                <p class="text-center text-muted">El costo del plan es de 30$</p>
            </div>
        </div>
        <div class="row py-4 justify-content-center">
            @if (session('status'))
                <div class="col-12 pb-4">
                    <div class="alert alert-success">
                         {{ session('status') }}
                    </div>
                </div>
            @endif
            <div class="col-sm-12 col-md-12 col-lg-8">
                <p class="h3 text-center pb-4">Solicitar plan alimenticio</p>
                <form action="{{ route('solicitud_plan_alimenticio.store') }}" method="POST">
                    @csrf
                    <div class="py-2">
                        <label for="edad" class="form-label">Edad</label>
                        <input type="text" id="edad" name="edad" class="form-control @error('edad') is-invalid @enderror" >
                        @error('edad')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="py-2">
                        <label for="peso" class="form-label">Peso</label>
                        <input type="text" id="peso" name="peso" class="form-control @error('peso') is-invalid @enderror" >
                        @error('peso')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="py-2">
                        <label for="alergias" class="form-label">Alergias</label>
                        <input type="text" id="alergias" name="alergias" class="form-control @error('alergias') is-invalid @enderror" >
                        @error('alergias')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="py-2">
                        <label for="objetivo" class="form-label">Objetivo que deseas</label>
                        <textarea id="objetivo" name="objetivo" class="form-control @error('objetivo') is-invalid @enderror" rows="5"></textarea>
                        @error('objetivo')
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