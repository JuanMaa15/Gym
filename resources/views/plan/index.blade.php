@extends('layouts.app')

@section('content')
<!-- Planes y precios -->
<section id="plans" class="py-5">
    <div class="container">
      <div class="row">
        <div class="col">
          <h2 class="titulo text-center">Nuestros planes</h2>
        </div>
      </div>
      <div class="row">
        @foreach ($planes as $plan)
            
        
        <div class="col-sm-12 col-md-6 col-lg-3 pb-4">
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
                <form action="{{ route('clientes.create') }}" method="GET">
                    <button type="submit" class="btn btn-primary" name="plan_id" value="{{ $plan->id }}">Comprar</button>
                    <span>precio: {{ $plan->precio }}$</span>
                </form>  
                
              </div>
            </div>
          </div>
        </div>
        
        @endforeach
      </div>
    </div>
  </section>
  @endsection