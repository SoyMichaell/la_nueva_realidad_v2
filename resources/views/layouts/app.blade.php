<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>La Nueva Realidad | SENA Casanare</title>

    <!-- Scripts -->

    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="shortcut icon" href="{{ asset('image/favicon.png') }}" type="image/x-icon">

    <!-- Styles -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    
    @yield('css')

</head>

<body class="sb-nav-fixed">
    @include('sweetalert::alert')
    @if (Auth::check())
        <nav class="sb-topnav navbar navbar-expand navbar-light bg-orange">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="{{ url('/home') }}">La Nueva Realidad</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0 text-dark" id="sidebarToggle"
                href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar-->
            <ul class="navbar-nav d-flex justify-content-end w-100 ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user-circle"></i>
                        {{ Auth::user()->nombre }}</a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item"
                                href="{{ url('usuario/' . Str::lower(Auth::user()->slug) . '/perfil') }}"><i
                                    class="fas fa-id-badge"></i> Perfil</a>
                        </li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i
                                    class="fas fa-sign-out-alt"></i> Cerrar
                                sesión</a>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" class="d-none">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>

        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-light shadow-sm" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Dashboard</div>
                            <a class="nav-link" href="{{ url('/home') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                                Home
                            </a>
                            <div class="sb-sidenav-menu-heading">Configuración</div>
                            <!--Menu configuración-->
                            @foreach ($permisos as $permiso)
                                @if ($permiso->permiso == 'configuracion')
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                        data-bs-target="#collapseSettings" aria-expanded="false"
                                        aria-controls="collapseSettings">
                                        <div class="sb-nav-link-icon"><i class="fas fa-cogs"></i></div>
                                        Configuración
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="collapseSettings" aria-labelledby="headingOne"
                                        data-bs-parent="#sidenavAccordion">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="{{ url('rol') }}">Roles y permisos</a>
                                        </nav>
                                    </div>
                                @endif
                            @endforeach
                            <!--Menu registros-->
                            <div class="sb-sidenav-menu-heading">Registros</div>
                            @foreach ($permisos as $permiso)
                                @if ($permiso->permiso == 'usuario')
                                    <a class="nav-link" href="{{ url('usuario') }}">
                                        <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                        Registro de usuarios
                                    </a>
                                    <a class="nav-link" href="{{ url('empresa') }}">
                                        <div class="sb-nav-link-icon"><i class="fas fa-business-time"></i></div>
                                        Registro de empresas
                                    </a>
                                @endif
                            @endforeach
                            <div class="sb-sidenav-menu-heading">Componentes</div>
                            <!--Funcionalidades-->
                            <a class="nav-link" href="{{ url('diagnostico/individual') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-project-diagram"></i></div>
                                Cuadro de mando integral
                            </a>
                            <a class="nav-link" href="{{ url('reporte') }}">
                                <div class="sb-nav-link-icon"><i class="far fa-file-alt"></i></div>
                                Reportes
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Inicio de sesión en:</div>
                        La Nueva Realidad
                    </div>
                </nav>
            </div>
    @endif

    <div id="layoutSidenav_content">
        @yield('content')
    </div>
    </div>

    <!--Plugin Jquery-->
    <script src="{{ asset('js/jquery-1.12.0.min.js') }}"></script>
    <!--JS Sidebar toogle-->
    <script src="{{ asset('js/scripts.js') }}"></script>
    @yield('js')
    <!--JS Canvas charts-->
    <script src="{{ asset('js/charts.js') }}"></script>
</body>

</html>
