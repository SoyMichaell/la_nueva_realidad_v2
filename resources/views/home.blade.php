@extends('layouts.app')
@section('content')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <main>
        <div class="container-fluid px-4">
            <div class="row mt-3">
                <div class="col-xl-12">
                    <div class="row">
                        <div class="col-4">
                            <div class="card card-custom border-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <span><i class="fas fa-user-tie text-icon-ver"></i></span>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="content">
                                                <h3 class="title-card">{{ $cuentaInstructor->count() }}</h3>
                                                <p class="subtitle-card">Instructor</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card card-custom border-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <span><i class="fas fa-user-secret text-icon-amar"></i></span>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="content">
                                                <h3 class="title-card">{{ $cuentaInvestigador->count() }}</h3>
                                                <p class="subtitle-card">Investigador</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card card-custom border-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <span><i class="fas fa-user-graduate text-icon-roj"></i></span>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="content">
                                                <h3 class="title-card">{{ $cuentaAprendiz->count() }}</h3>
                                                <p class="subtitle-card">Aprendiz</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mt-2">
                            <div class="card border-0">
                                <div class="title-grafico">
                                    <h4>Seguimiento etapas (Implementación)</h4>
                                    <table class="table-custom">
                                        <thead>
                                            <tr>
                                                <th>Nit empresa</th>
                                                <th>% Avance</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($validacionInstrumento as $item)
                                                <?php $prom = $item->suma1 + $item->suma2 + $item->suma3 + $item->suma4; ?>
                                                <tr>
                                                    <td>{{ $item->nit_empresa }}</td>
                                                    <td>
                                                        <div class="progress">
                                                            <div class="progress-bar" role="progressbar"
                                                                aria-label="Example with label" style="width: {{$prom}}%;"
                                                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{$prom}} %
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 mt-2">
                            <div class="card border-0">
                                <div class="title-grafico">
                                    <h4>Diagnostico global | Muestra Fase II <span class="fw-bold">(35)</span></h4>
                                </div>
                                <div id="graficoDiagnostico" style="height: 400px; padding: 10px"></div>
                            </div>
                        </div>
                        <div class="col-md-12 mt-2">
                            <div class="card border-0">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="title-grafico">
                                            <h4>Usuarios registrados en plataforma</h4>
                                        </div>
                                        <div id="graficoUsuario" style="height: 300px"></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="title-grafico">
                                            <h4>Empresas por municipio</h4>
                                        </div>
                                        <div id="graficoMunicipio" style="height: 300px"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </main>
@section('js')
    @include('charts/js.js')
@endsection
@endsection
