<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

   
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @vite(['resources/css/app.css'])

     <!-- Scripts -->
    <script src="https://kit.fontawesome.com/4240342587.js"></script>
    <script src="{{ asset('jquery.js') }}"></script>
</head>
<body>

    <!-- Encabezado -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">GymSport</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link" href="/">Inicio</a>
                        <a class="nav-link" href="">Noticias</a>
                        <a class="nav-link" href="#">Instructores</a>
                       
                        @if (Auth::user() || (Auth::guard('personal')->user() && Auth::guard('personal')->user()->tiposPersonal->rol_id == 1))
                            
                        <a class="nav-link" href="{{ Auth::guard('personal')->user() ? route('instructores.edit', Auth::guard('personal')->user()) : route('clientes.edit', Auth::user()) }}">Perfil</a>

                            @if (Auth::guard('personal')->user())
        
                                <a class="nav-link" href="{{ Auth::guard('personal')->user()->tiposPersonal->id == 3 ? route('planes_alimenticios.show_instructores', Auth::guard('personal')->user()) : route('horas.index') }}">Servicios</a>
                            @else
                            <a class="nav-link" href="{{ route('entrenamiento_personalizado.create') }}">Servicios</a>

                            @endif
                            
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <input type="submit" class="nav-link bg-transparent border-0" value="Cerrar sesion">
                            </form>

                        @elseif(Auth::guard('personal')->user() && Auth::guard('personal')->user()->tiposPersonal->rol_id == 2) 
                            <a class="nav-link" href="{{ route('admins.home') }}">Panel de control</a>
                        @else
                            <a class="nav-link" href="{{ route('planes.index') }}">Inscribirse</a>
                            <a class="nav-link" href="{{ route('login') }}">Clientes</a>
                            <a class="nav-link" href="{{ route('login_personal') }}">Personal</a>
                        @endif

                    </div>
                </div>
            </div>
        </nav>
    </header>
    
    {{-- Contenedor principal --}}
    <main class="content">
        @yield('content')
    </main>

    <!-- Pie de pagina -->
    <footer class="pt-5 bg-dark text-white">
        <div class="container">
            <div class="row pb-3">
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <p class="h3">Contacto</p>
                    <ul class="list-unstyled">
                        <li>Direccion: </li>
                        <li>Telefono: </li>
                        <li>Email: </li>
                        <li>Whatshap: </li>
                    </ul>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <p class="h3">Redes sociales</p>
                    <ul class="list-unstyled">
                        <li>Facebook: </li>
                        <li>Instagram: </li>
                        <li>Twitter: </li>
                        <li>Tik Tok: </li>
                    </ul>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <p class="h3">GymSport</p>
                    <ul class="list-unstyled">
                        <li>Inicio</li>
                        <li>Noticias</li>
                        <li>Instructores</li>
                        <li>Inscribirse</li>
                        <li>Iniciar sesión</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="border-top d-flex justify-content-center py-3">
            Todos los derechos reservados &copy;
        </div>
    </footer>
</body>
</html>
