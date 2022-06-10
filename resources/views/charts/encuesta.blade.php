@extends('layouts.app')

@section('content')
    <main>
        <div class="container px-4">
            <div class="row">
                <div class="col-md-6 mt-2">
                    <div class="card">
                        <div class="card-header">Grafica 1 <a id="download1" download="Grafico1" href="">Descargar</a>
                        </div>
                        <div class="card-body">
                            <p>1. ¿Realizo procesos de capacitación durante el año 2020?</p>
                            <canvas id="charts1"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-2">
                    <div class="card">
                        <div class="card-header">Grafica 2 <a id="download2" download="Grafico2" href="">Descargar</a>
                        </div>
                        <div class="card-body">
                            <p>2. ¿En el año 2020 como consecuencia del covid-19, sus empleados realizaron trabajo en casa?
                            </p>
                            <canvas id="charts2"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mt-2">
                    <div class="card">
                        <div class="card-header">Grafica 3 <a id="download3" download="Grafico3" href="">Descargar</a>
                        </div>
                        <div class="card-body">
                            <p>3. ¿Qué tipo de reformas debió realizar la empresa para ajustarse a los cambios generados por
                                la pandemia?
                            </p>
                            <canvas id="charts3"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mt-2">
                    <div class="card">
                        <div class="card-header">Grafica 4 <a id="download4" download="Grafico4" href="">Descargar</a>
                        </div>
                        <div class="card-body">
                            <p>4. De acuerdo a las reformas que debió realizar la empresa para ajustarse a los cambios
                                generados por el Covid-19 durante marque con una X sobre la reforma en la que haya generado
                                más impacto sobre las ventas y/o empleo
                            </p>
                            <canvas id="charts4"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-2">
                    <div class="card">
                        <div class="card-header">Grafica 5 <a id="download5" download="Grafico5" href="">Descargar</a>
                        </div>
                        <div class="card-body">
                            <p>5. Durante el Primer año de convivencia con el Covid–19, usted se vio en la necesidad de
                                prescindir de los servicios de algún colaborador?
                            </p>
                            <canvas id="charts5"></canvas>
                        </div>
                    </div>
                </div>
            </div>
    </main>
@section('js')
    @include('charts/js.encuesta')
@endsection
@endsection
