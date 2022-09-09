@extends('layouts.app')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <div class="row mt-3">
                <div class="col-xl-12">
                    <div class="row">
                        @foreach ($usuarios as $rol)
                            <div class="col-3 mt-2">
                                <div class="card card-custom border-0">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <span><i
                                                        class="{{ $rol->nombre_rol == 'Administrador' ? 'fas fa-user-lock text-icon-ver' : ($rol->nombre_rol == 'Aprendiz' ? 'fas fa-users text-icon-amar' : ($rol->nombre_rol == 'Instructor investigador' ? 'fas fa-user-secret text-icon-roj' : ($rol->nombre_rol == 'Investigador Junior' ? 'fas fa-user-edit text-icon-ver' : ''))) }}"></i></span>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="content">
                                                    <h3 class="title-card">{{ $rol->total }}</h3>
                                                    <p class="subtitle-card">{{ $rol->nombre_rol }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-md-8 mt-2">
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
                                                <tr>
                                                    <td>{{ $item->nit_empresa }}</td>
                                                    <td>
                                                        <div class="progress">
                                                            <div class="progress-bar " role="progressbar"
                                                                aria-label="Example with label"
                                                                style="width: {{ $item->suma1 + $item->suma2 + $item->suma3 + $item->suma4 }}%; background-color: {{ $coloresRand[array_rand($coloresRand)] }};"
                                                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                                {{ $item->suma1 + $item->suma2 + $item->suma3 + $item->suma4 }}
                                                                %
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
                        <div class="col-md-4 mt-2">
                            <div class="card border-0">
                                <div class="title-grafico">
                                    <h4>Usuarios registrados en plataforma</h4>
                                </div>
                                <div id="graficoUsuario" style="height: 300px"></div>
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
                        <div class="col-md-4 mt-2">
                            <div class="card border-0">
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
    </main>
    @section('js')
        @include('charts/js/js')
    @endsection
@endsection
