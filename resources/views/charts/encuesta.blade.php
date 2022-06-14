@extends('layouts.app')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <div class="alert">
                <h1 class="mt-4">Perspectiva de crecimiento y desarrollo</h1>
            </div>
            <div class="row">
                <div class="col-md-3 mt-2">
                    <div class="card">
                        <div class="card-header">Grafica 1 <a id="download1" download="Grafico1" href="">Descargar</a>
                        </div>
                        <div class="card-body">
                            <p>1. ¿Realizo procesos de capacitación durante el año 2020?</p>
                            <canvas id="charts1"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mt-2">
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
                <div class="col-md-6 mt-2">
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
                <div class="col-md-6 mt-2">
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
                <div class="col-md-3 mt-2">
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
                <div class="col-md-3 mt-2">
                    <div class="card">
                        <div class="card-header">Grafica 5.1</div>
                        <div class="card-body">
                            <p>5.1 Si su respuesta anterior fue SI, señale ¿Cuantos?
                            </p>
                            <canvas id="charts5_1"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 mt-2">
                    <div class="card">
                        <div class="card-header">Grafica 6</div>
                        <div class="card-body">
                            <p>6. ¿Cuál ha sido el tipo de reinvención ó innovación realizada en su empresa para enfrentar
                                los efectos de la pandemia?
                            </p>
                            <canvas id="charts6"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-2">
                    <div class="card">
                        <div class="card-header">Grafica 7</div>
                        <div class="card-body">
                            <p>7. Durante el primer año de convivencia con el COVID-19 su empresa presento un:
                            </p>
                            <canvas id="charts7"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-2">
                    <div class="card">
                        <div class="card-header">Grafica 8</div>
                        <div class="card-body">
                            <p>8. Evalúe de 1 a 5, siendo 1 menos importante y 5 más importante, con relación a los
                                principales factores que usted considera han afectado su actividad productiva, durante el
                                primer año de convivencia con el Covid-19.
                            </p>
                            <canvas id="charts8"></canvas>
                        </div>
                    </div>
                </div>
            </div>
    </main>
@section('js')
    @include('charts/js.encuesta')
@endsection
@endsection
