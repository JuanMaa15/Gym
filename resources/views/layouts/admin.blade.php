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

    <div class="container-fluid p-0">
    <!-- Barras de navegacion -->
        <nav class="navbar navbar-expand-lg navbar-vertical navbar-dark bg-dark">
            <div class="container-fluid">
                <div class="w-100 d-flex justify-content-between">
                    <a class="navbar-brand" href="#">GymSport</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link" href="{{ route('admins.home') }}">Inicio</a>
                        <a class="nav-link" href="{{ route('admins.gestion')}}">Gestion</a>
                        <a class="nav-link" href="{{ route('admins.edit', Auth::guard('personal')->user() ) }}">Perfil</a>
                        <a class="nav-link" href="{{ route('index') }}">Principal</a>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <input type="submit" class="nav-link bg-transparent border-0" value="Cerrar sesion">
                        </form>
                    </div>
                </div>
            </div>
        </nav>

        <div class="content admin">
            @yield('content')
        </div>

    </div>

    
</body>
</html>
