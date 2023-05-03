@extends('layouts.admin')

@section('content')

    <section id="dashboard-admin" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="titulo">Asignar plan alimenticio</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col">
                    <!-- Formulario -->
                    <form action="{{ route('planes_alimenticios.store') }}" method="POST">
                        @csrf
                        <div class="row justify-content-center">
                            <div class="col-sm-12 col-md-12 col-lg-6">

                                <input type="hidden" value="{{ $solicitud_plan_alimenticio_id }}" name="solicitud_plan_alimenticio_id" class="form-control @error('solicitud_plan_alimenticio_id') is-invalid  @enderror">
                                @error('solicitud_plan_alimenticio_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        
                                <div class="py-2">
                                    <label for="personal_id" class="form-label">Personal</label>
                                    <select id="personal_id" name="personal_id" class="form-select @error('personal_id') is-invalid @enderror" >
                                        <option>Seleccionar instructor</option>
                                        @foreach ($personal as $p)
                                            @if ($p->tipo_personal_id == 3)
                                                <option value="{{ $p->id }}">{{ $p->nombre. ' ' . $p->apellido}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('personal_id')
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