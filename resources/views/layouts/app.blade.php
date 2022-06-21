<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!--Datatables-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.css" />

    @yield('css')

</head>

<body class="sb-nav-fixed" style="background-color: #fff;">
    @include('sweetalert::alert')
    @if (Auth::check())
        <nav class="sb-topnav navbar navbar-expand navbar-light bg-light shadow-sm">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="{{ url('/home') }}">La Nueva Realidad</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                    class="fas fa-bars"></i></button>
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
                        <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i> Cerrar
                                sesión</a>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                class="d-none">
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
                            <div class="sb-sidenav-menu-heading">Principal</div>
                            <a class="nav-link" href="{{ url('/home') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Principal
                            </a>
                            <!--Menu configuración-->
                            @foreach ($permisos as $permiso)
                                @if ($permiso->permiso == 'configuracion')
                                    <div class="sb-sidenav-menu-heading">Configuración</div>
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
                            @foreach ($permisos as $permiso)
                                @if ($permiso->permiso == 'usuario')
                                    <div class="sb-sidenav-menu-heading">Registros</div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                        data-bs-target="#collapseLayouts" aria-expanded="false"
                                        aria-controls="collapseLayouts">
                                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                        Módulo de registros
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                                        data-bs-parent="#sidenavAccordion">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="{{ url('usuario') }}">Usuarios</a>
                                            <a class="nav-link" href="{{ url('empresa') }}">Empresas</a>
                                        </nav>
                                    </div>
                                @endif
                            @endforeach
                            <!--Funcionalidades-->
                            <div class="sb-sidenav-menu-heading">Funciones</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                data-bs-target="#collapseFormats" aria-expanded="false" aria-controls="collapseFormats">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Formatos
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseFormats" aria-labelledby="headingOne"
                                data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{ url('diagnostico/fase1') }}">Diagnostico Fase
                                        I</a>
                                    <a class="nav-link" href="{{ url('diagnostico/individual') }}">Análisis
                                        microempresa</a>
                                    <a class="nav-link" href="{{ url('diagnostico/dofa') }}">DOFA/Objetivos estrategicos</a>
                                    <!--<a class="nav-link" href="{{ url('diagnostico/planaccion') }}">Plan de
                                        acción
                                        microempresa</a>-->
                                </nav>
                            </div>
                            <!--Fin-->
                            <!--Resultados-->
                            <div class="sb-sidenav-menu-heading">RESULTADOS GRAFICOS</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                data-bs-target="#collapseCharts" aria-expanded="false" aria-controls="collapseCharts">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Resultados graficos
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseCharts" aria-labelledby="headingOne"
                                data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{ url('grafico/encuesta') }}">Resultados encuesta</a>
                                </nav>
                            </div>
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

    <script src="{{ asset('js/jquery-1.12.0.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#SimpleTable').DataTable({
                language: {
                    "decimal": "",
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                    "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                    "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ Entradas",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
            });
        });
    </script>

    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @yield('js')

    <script src="{{ asset('js/charts.js') }}"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script>



</body>

</html>
