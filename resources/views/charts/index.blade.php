@extends('layouts.app')
<style>
    #chartsperson {
        max-width: 600px;
    }
</style>
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Graficos</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Principal</li>
            </ol>
            <div class="row">
                <div class="col-md-4 mt-2">
                    <div class="card">
                        <div class="card-header">Grafica de usuarios en plataforma La Nueva Realidad
                            2022,
                            vinculados al proyecto en la FASE II</div>
                        <div class="card-body">
                            <canvas id="chartsperson"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 mt-2">
                    <div class="card">
                        <div class="card-header">Grafica de empresas registradas en camara de comercio año 2020 para
                            selección de muesta de 374 microempresarios del Departamento de Casanare</div>
                        <div class="card-body">
                            <canvas id="chartsbussines"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-2">
                    <div class="card">
                        <div class="card-header">Grafico de empresas seleccionadas para la aplicación
                            de la herramienta de diagnóstico a microempresarios del departamento de Casanare</div>
                        <div class="card-body">
                            <canvas id="chartsbussinesx"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-2">
                    <div class="card">
                        <div class="card-header">Grafico promedio de puntaje obtenido a partir del
                            instrumento de recolección encuesta por municipio</div>
                        <div class="card-body">
                            <canvas id="chartspuntaje"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @include('charts.js')
@endsection

