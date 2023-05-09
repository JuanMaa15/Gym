
 @extends('layouts.app')

 @section('content')
  <!-- Login -->
  <section id="login" class="py-5">
     <div class="container py-5">
         <div class="row">
             <div class="col">
                 <h2 class="titulo text-center">Iniciar Sesión (Personal)</h2>
             </div>
         </div>
         <div class="row justify-content-center">
             <div class="col ">
                 <!-- Formulario de login -->
                 <form action="{{ route('login_personal') }}" method="POST" >
                     @csrf
                     <div class="row justify-content-center">
                         <div class="col-sm-12 col-md-12 col-lg-6">
 
                             <input type="hidden" id="plan_id" name="plan_id" class="form-control" value="">
                             <div class="py-2">
                                 <label for="id" class="form-label">Numero de identificacion</label>
                                 <input type="text" id="id" name="id" class="form-control @error('id') is-invalid @enderror" >
                                 @error('id')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                             </div>
                             <div class="py-2">
                                 <label for="password" class="form-label">Contraseña</label>
                                 <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" >
                                 @error('password')
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