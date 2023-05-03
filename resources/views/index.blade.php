@extends('layouts.app')

@section('content')
    <!-- Banner -->
    <section id="banner">
        <img src="{{ asset('images/banner.jpg') }}" class="img-fluid">
        <h2 class="text-white position-absolute top-50 start-50 translate-middle display-1">GYMSPORT</h2>
    </section>

    <!-- Sobre nosotros -->
    <section id="about" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="titulo text-center">Sobre nosotros...</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-6 py-3">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum, odio. Nisi repellendus dignissimos pariatur similique sequi. Cum vitae exercitationem et cumque eum pariatur quos adipisci aliquam assumenda, perferendis asperiores earum eaque fugiat obcaecati, ad quam amet iste facilis veritatis necessitatibus voluptates, rem explicabo? Adipisci doloremque error culpa iste necessitatibus voluptate! Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe rem neque est nostrum asperiores et, reprehenderit ex harum dolorum. Suscipit dicta deserunt culpa ipsam id impedit at! Consectetur, distinctio amet?
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6 py-3">
                    <div class="row justify-content-center">

                        <div class="col-sm-6 col-md-4 col-lg-3 pb-3">
                            <p>Lunes</p>
                            <span >Hora - Hora</span>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3 pb-3">
                            <p>Martes</p>
                            <span>Hora - Hora</span>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3 pb-3">
                            <p>Miercoles</p>
                            <span>Hora - Hora</span>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3 pb-3">
                            <p>Jueves</p>
                            <span>Hora - Hora</span>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3 pb-3">
                            <p>Viernes</p>
                            <span>Hora - Hora</span>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3 pb-3">
                            <p>Sabado</p>
                            <span>Hora - Hora</span>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3 pb-3">
                            <p>Domingo</p>
                            <span>Hora - Hora</span>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Espacios de trabajo -->
    <section id="work-spaces" class="pb-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="titulo text-center">Espacios de trabajo</h2>
                </div>
            </div>
            <div class="row justify-content-center text-center">
                <div class="col-sm-12 col-md-6 col-lg-4 pb-4">
                    <p>Spinning</p>
                    <img src="{{ asset('images/work-img1.jpg') }}" class="img-fluid" alt="Espacio de trabajo">
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 pb-4">
                    <p">Salon de mancuernas</p>
                    <img src="{{ asset('images/work-img2.jpg') }}" class="img-fluid" alt="Espacio de trabajo">
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 pb-4">
                    <p >Salon de clase colectivas</p>
                    <img src="{{ asset('images/work-img3.jpg') }}" class="img-fluid" alt="Espacio de trabajo">
                </div>
            </div>
        </div>
    </section>

    <!-- Planes y precios -->
    <section id="plans" class="pb-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="titulo text-center">Nuestros planes</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-3 pb-4">
                    <div class="card">
                        <div class="card-header">
                            1 mes
                        </div>
                        <div class="card-body">
                          <h5 class="card-title">Servicios</h5>
                          <ul>
                            <li>Spinnig</li>
                            <li>Maquinas</li>
                            <li>Pesas</li>
                            <li>Asesoria</li>
                          </ul>
                          <div class="card-footer">
                            <a href="#" class="btn btn-primary">Comprar</a>
                            <span>precio: $$$$$</span>
                          </div>        
                        </div>
                      </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3 pb-4">
                    <div class="card">
                        <div class="card-header">
                            3 meses
                        </div>
                        <div class="card-body">
                          <h5 class="card-title">Servicios</h5>
                          <ul>
                            <li>Spinnig</li>
                            <li>Maquinas</li>
                            <li>Pesas</li>
                            <li>Asesoria</li>
                          </ul>
                          <div class="card-footer">
                            <a href="#" class="btn btn-primary">Comprar</a>
                            <span>precio: $$$$$</span>
                          </div>        
                        </div>
                      </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3 pb-4">
                    <div class="card">
                        <div class="card-header">
                            6 meses
                        </div>
                        <div class="card-body">
                          <h5 class="card-title">Servicios</h5>
                          <ul>
                            <li>Spinnig</li>
                            <li>Maquinas</li>
                            <li>Pesas</li>
                            <li>Asesoria</li>
                            <li>Boxeo</li>
                          </ul>
                          <div class="card-footer">
                            <a href="#" class="btn btn-primary">Comprar</a>
                            <span>precio: $$$$$</span>
                          </div>        
                        </div>
                      </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3 pb-4">
                    <div class="card">
                        <div class="card-header">
                            12 meses
                        </div>
                        <div class="card-body">
                          <h5 class="card-title">Servicios</h5>
                          <ul>
                            <li>Spinnig</li>
                            <li>Maquinas</li>
                            <li>Pesas</li>
                            <li>Asesoria</li>
                            <li>Boxeo</li>
                          </ul>
                          <div class="card-footer">
                            <a href="#" class="btn btn-primary">Comprar</a>
                            <span>precio: $$$$$</span>
                          </div>        
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contacto -->
    <section id="contacto" class="pb-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="titulo text-center">Contactanos</h2>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <!-- Formulario de contacto -->
                    <form action=""  >
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-6">
                                <div class="py-3">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input type="text" id="nombre" name="nombre" class="form-control" >
                                </div>
                                <div class="py-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" id="email" name="email" class="form-control" >
                                </div>
                                <div class="py-3">
                                    <label for="telefono" class="form-label">Telefono</label>
                                    <input type="text" id="telefono" name="telefono" class="form-control" >
                                </div>      
                            </div>

                            <div class="col-sm-12 col-md-12 col-lg-6">
                                <div class="py-3">
                                    <label for="asunto" class="form-label">Asunto</label>
                                    <input type="text" id="asunto" name="asunto" class="form-control" >
                                </div>
                                <div class="py-3">
                                    <label for="mensaje" class="form-label">Mensaje</label>
                                    <textarea name="mensaje" id="mensaje" rows="5" class="form-control"></textarea>
                                </div>
                                     
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
@endsection