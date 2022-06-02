@extends('layouts.app')

@section('content')
    <style>
        .sectionone {
            margin-top: 10%;
        }

        li {
            list-style: none;

        }

        a {
            color: inherit;
        }

        .nav-link {
            color: inherit;
        }

        .nav-link:hover {
            color: #fc7323;
        }

        .navbar-brand {
            cursor: pointer;
        }

        .navbar-brand:hover {
            color: #fc7323;
        }

    </style>
    <nav class="container navbar">
        <div class="container-fluid">
            <a class="navbar-brand">La Nueva Realidad</a>
            <div class="d-flex justify-content-end">
                <a class="nav-link btn btn-primario" href="">Dashboard</a>
                <a class="nav-link" href="{{ route('login') }}">Acceder</a>
            </div>
        </div>
    </nav>
    <section class="sectionone" id="sectionone">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="fw-bold">Consulta el diagnostico de tu empresa</h1>
                    <form action="" method="post">
                        <input class="form-control" type="search" name="" id="" placeholder="Buscar empresa por nit">
                        <div class="alert alert-warning mt-2" role="alert">
                            <h5 class="alert-heading"><i class="fas fa-info-circle"></i> Información</h5>
                            <p>La información recopilada de las microempresas del
                                departamento de Casanare,
                                inicialmente fue sumistrado por
                                la camara de comercion en el año <strong>2021</strong> como muestra fundamental del estudio,
                                posteriormente se
                                calculo una
                                muestra significativa de microempresarios interesados en participar de este proceso el cual
                                se
                                determino un
                                total de <strong>374</strong> microempresas distribuidas por todo el departamento de
                                Casanare.</p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--
        <div class="container mx-auto d-block footer ml-2">
            <div class="row">
                <div class="col-md-6">
                    <ul>
                        <li><a class="nav-link" href="">
                                <h5>ENLACES DE INTERES</h5>
                            </a></li>
                        <li><a class="nav-link" href="https://www.sena.edu.co/" target="_blank">Pagina oficial
                                Servicio Naciona del Aprendizaje (SENA)</a></li>
                        <li><a class="nav-link" href="https://www.sena.edu.co/" target="_blank">Pagina oficial
                                Sistema De Investigación, Desarrollo tecnólogico e innovación</a></li>
                        <li><a class="nav-link" href="http://oferta.senasofiaplus.edu.co/" target="_blank">Sena
                                sofia plus</a></li>
                        <li><a class="nav-link" href="https://cccasanare.co/" target="_blank">Camara de comercio de
                                Casanares</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <img class="img-fluid mx-auto d-block" style="width: 350px" src="/image/sennova.png" alt="">
                </div>
            </div>
        </div>
        -->
    </section>
    <script type="text/javascript">
        $(document).ready(function() {
            var height1 = $(window).height();
            $('#sectionone').height(height1);
        });
    </script>
@endsection
