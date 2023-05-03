@extends('layouts.servicios')

@section('content-services')

    <div class="row">
        <div class="col">
            <h2 class="titulo text-center">Entrenamientos personalizados</h2>
        </div>
    </div>
    <div class="row py-4 justify-content-center">
        <div class="col-sm-12 col-md-12 col-lg-8">
            <p class="h3 text-center pb-4">Solicitar entrenamiento</p>
            <form action="">
                <div class="py-2">
                    <label for="fecha" class="form-label">Fecha reserva</label>
                    <input type="date" id="fecha" name="fecha" class="form-control" >
                </div>
                <div class="py-2">
                    <input type="submit" class="btn btn-primary" value="Enviar">
                </div>
            </form>
        </div>
    </div>

@endsection