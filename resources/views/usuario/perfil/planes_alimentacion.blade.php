@extends('layouts.config')

@section('content_profile')

   
    <div class="row">
        <div class="col">
            <h2 class="titulo text-center">Planes de alimentación</h2>
        </div>
    </div>
    <div class="row py-4 justify-content-center">
        @foreach ($planes_alimenticios as $plan_alimentacion)
            <div class="col-sm-12 col-md-12 col-lg-10 pb-5">
                <div class="card">
                    <div class="card-header">
                        Plan de alimentacion
                    </div>
                    <div class="card-body">
                        {{ $plan_alimentacion->descripcion }} 
                    </div>
                    <div class="card-footer">
                        Fecha inicio - Fecha fin
                        {{ $plan_alimentacion->fecha_inicio . " - " . $plan_alimenticio->fecha_fin }} 
                    </div>
                </div>
            </div>
        @endforeach
        

        <div class="col-sm-12 col-md-12 col-lg-10 pb-5">
            <div class="card">
                <div class="card-header">
                    Plan de alimentacion
                </div>
                <div class="card-body">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio animi, dolorem atque facilis nulla aliquid? Nesciunt, ipsum. Eos dolorem esse in asperiores sed! Dolorum atque expedita quo veniam, impedit aperiam eum soluta fugiat dicta debitis magnam nemo aut voluptate sed reiciendis ea in totam ex explicabo! Quae maiores pariatur delectus! 
                </div>
                <div class="card-footer">
                    Fecha inicio - Fecha fin
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-12 col-lg-10 pb-5">
            <div class="card">
                <div class="card-header">
                    Plan de alimentacion
                </div>
                <div class="card-body">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio animi, dolorem atque facilis nulla aliquid? Nesciunt, ipsum. Eos dolorem esse in asperiores sed! Dolorum atque expedita quo veniam, impedit aperiam eum soluta fugiat dicta debitis magnam nemo aut voluptate sed reiciendis ea in totam ex explicabo! Quae maiores pariatur delectus! 
                </div>
                <div class="card-footer">
                    Fecha inicio - Fecha fin
                </div>
            </div>
        </div>
    </div>

@endsection