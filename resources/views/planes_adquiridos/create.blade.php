@extends('layouts.config')

@section('content_profile')

    <div class="row">
        <div class="col">
            <h2 class="titulo text-center">Nuevo plan</h2>
        </div>
    </div>
    <div class="row py-4 justify-content-center">
        <div class="col">
            <form action="{{ route('planes_adquiridos.store') }}" method="POST">
                @csrf
                <div class="row">
                    @foreach ($planes as $plan)
                
                    <div class="col-sm-12 col-md-6 col-lg-4 pb-4">
                    <div class="card">
                        <div class="card-header">
                        {{ $plan->plan }}
                        </div>
                        <div class="card-body">
                        <h5 class="card-title">Servicios</h5>
                        <p>{{ $plan->descripcion }}</p>
                        {{-- <ul>
                            <li>Spinnig</li>
                            <li>Maquinas</li>
                            <li>Pesas</li>
                            <li>Asesoria</li>
                        </ul> --}}
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" name="plan_id" value="{{ $plan->id }}">Comprar</button>
                            <span>precio: {{ $plan->precio }}$</span>    
                        </div>
                        </div>
                    </div>
                </div>
                
                @endforeach
              </div>
            </form>
        </div>
    </div>

@endsection