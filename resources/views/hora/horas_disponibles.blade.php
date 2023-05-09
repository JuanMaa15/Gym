@extends('layouts.servicios')

@section('content-services')
     
        <div class="row">
            <div class="col">
                <h2 class="titulo text-center">Horas</h2>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form action="{{ route('entrenamiento_personalizado.completar', $fecha) }}" method="GET">
                    
                    <?php $existe = false; ?>

                    <div class="row justify-content-center pt-5">
                        @foreach ($horas as $hora)

                            @foreach ($entrenamientos_personalizados as $entrenamiento_personalizado)

                                    {{-- Verificar si ya hay una reserva con esa fecha y hora --}}
                                    @if ($entrenamiento_personalizado->fecha == $fecha &&  $entrenamiento_personalizado->hora_id == $hora->id )
                                            <?php $existe = true ?>
                                    @endif

                            @endforeach

                            @if (!$existe)
                                <div class="col-sm-6 col-md-4 col-lg-3 pb-3">
                                    <button type="submit" value="{{ $hora->id }}" name="hora" class="btn btn-lg btn-primary w-100">{{ $hora->hora }}</button>
                                </div>
                            @else
                                <div class="col-sm-6 col-md-4 col-lg-3 pb-3">
                                    <button type="submit" value="{{ $hora->id }}" name="hora" class="btn btn-lg btn-primary w-100" disabled>{{ $hora->hora }} <span class="d-block"> No disponible</span></button>
                                </div>
                            @endif
                            
                        @endforeach
        
                        
                    </div>
                </form>
            </div>
        </div>

@endsection 