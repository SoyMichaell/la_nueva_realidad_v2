@extends('layouts.app')
<style>
    #chartsperson {
        max-width: 600px;
    }
</style>
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Panel principal</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Principal</li>
            </ol>
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">Usuarios en plataforma ({{ count($users) }})</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="{{ url('usuario') }}">Ver detalles</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body">Empresas muestra general ({{ number_format(count($empresas), 0) }})
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="{{ url('diagnostico/fase1') }}">Ver
                                detalles</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body">Avance aplicación diseño metodologico</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="{{ url('diagnostico/individual') }}">Ver
                                detalles</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <h1 class="mt-4">Graficas principales</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Graficas</li>
            </ol>
            <div class="row">
                <div class="col-md-4 mt-2">
                    <div class="card">
                        <div class="card-body">
                            <p class="alert alert-primary text-center">Grafica de usuarios en plataforma La Nueva Realidad
                                2022,
                                vinculados al proyecto en la FASE II.</p>
                            <canvas id="chartsperson"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 mt-2">
                    <div class="card">
                        <div class="card-body">
                            <p class="alert alert-primary text-center">Grafica de empresas registradas en camara de comercio
                                año 2020
                                para selección de muesta de 374 microempresarios del Departamento de Casanare.</p>
                            <canvas id="chartsbussines"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 mt-2">
                    <div class="card">
                        <div class="card-body">
                            <p class="alert alert-primary text-center">Grafico de empresas seleccionadas para la aplicación
                                de la herramienta de diagnóstico a microempresarios del departamento de Casanare.</p>
                            <canvas id="chartsbussinesx"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <br>
@section('js')
    <script type="text/javascript">
        //Grafico personas
        const ctx1 = document.getElementById('chartsperson');
        const myChart1 = new Chart(ctx1, {
            type: 'doughnut',
            data: {

                labels: [<?php foreach($usuarios as $usuario){?><?php echo "'" . $usuario->nombre_rol . "'"; ?>, <?php } ?>],
                datasets: [{
                    label: 'Total',
                    data: [<?php foreach($usuarios as $usuario){?><?php echo $usuario->total; ?>, <?php } ?>],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {

            }
        });
        //Grafico empresas
        const ctx2 = document.getElementById('chartsbussines');
        const myChart2 = new Chart(ctx2, {
            type: 'bar',
            data: {

                labels: [<?php foreach($empresasCharts as $empresa){?><?php echo "'" . $empresa->municipio . "'"; ?>, <?php } ?>],
                datasets: [{
                    label: 'Total',
                    data: [<?php foreach($empresasCharts as $empresa){?><?php echo $empresa->total; ?>, <?php } ?>],
                    backgroundColor: [
                        'rgb(240, 248, 255)',
                        'rgb(250, 235, 215)',
                        'rgb(127, 255, 212)',
                        'rgb(138, 43, 226)',
                        'rgb(100, 149, 237)',
                        'rgb(255, 127, 80)',
                        'rgb(0, 139, 139)',
                        'rgb(255, 20, 147)',
                        'rgb(255, 215, 0)',
                        'rgb(255, 240, 245)'
                    ],
                    borderColor: [
                        'rgb(240, 248, 255)',
                        'rgb(250, 235, 215)',
                        'rgb(127, 255, 212)',
                        'rgb(138, 43, 226)',
                        'rgb(100, 149, 237)',
                        'rgb(255, 127, 80)',
                        'rgb(0, 139, 139)',
                        'rgb(255, 20, 147)',
                        'rgb(255, 215, 0)',
                        'rgb(255, 240, 245)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {

            }
        });
        const ctx3 = document.getElementById('chartsbussinesx');
        const myChart3 = new Chart(ctx3, {
            type: 'bar',
            data: {

                labels: [<?php foreach($empresasCharts374 as $empresa){?><?php echo "'" . $empresa->municipio . "'"; ?>, <?php } ?>],
                datasets: [{
                    label: 'Total',
                    data: [<?php foreach($empresasCharts374 as $empresa){?><?php echo $empresa->total; ?>, <?php } ?>],
                    backgroundColor: [
                        'rgb(0, 0, 255)',
                        'rgb(138, 43, 226)',
                        'rgb(127, 255, 0)',
                        'rgb(220, 20, 60)',
                        'rgb(255, 215, 0)',
                        'rgb(255, 69, 0)',
                        'rgb(255, 0, 0)'
                    ],
                    borderColor: [
                        'rgb(0, 0, 255)',
                        'rgb(138, 43, 226)',
                        'rgb(127, 255, 0)',
                        'rgb(220, 20, 60)',
                        'rgb(255, 215, 0)',
                        'rgb(255, 69, 0)',
                        'rgb(255, 0, 0)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {

            }
        });
    </script>
@endsection

@endsection
