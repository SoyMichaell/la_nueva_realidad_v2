@extends('layouts.app')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <div class="alert alert-info">
                <h1 class="mt-4">Muestra 374 microempresas</h1>
                <p>Listado de empresas seleccionadas para aplicación del instrumento de recolección de la información para
                    el
                    diagnostico</p>
            </div>
            <hr>
            <div class="d-flex justify-content-start">
                <a class="btn btn-success btn-sm" href="{{url('diagnostico/excel')}}" target="_blank"><i class="fas fa-file-excel"></i> Excel</a>
            </div>
            <div class="card mt-2">
                <!--<div class="card-header"><i class="fas fa-table"></i> Listado empresas</div>-->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="p-1" id="SimpleTable">
                            <thead>
                                <tr class="bg-light">
                                    <th>#</th>
                                    <th>Nit</th>
                                    <th style="width: 25%">Razón social</th>
                                    <th style="width: 20%">CIIU</th>
                                    <th>Municipio</th>
                                    <th>Fecha registro encuesta</th>
                                    <th>Resultado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <tr>
                                    @foreach ($empresas as $empresa)
                                        <td>{{ $empresa->id }}</td>
                                        <td>{{ $empresa->nit }}</td>
                                        <td>{{ $empresa->razon_social }}</td>
                                        <td>{{ $empresa->ciiu_1 }}</td>
                                        <td>{{ $empresa->municipio }}</td>
                                        <td>{{ $empresa->fecha_registro_resultado }}</td>
                                        <td>
                                            <p
                                                class="@if ($empresa->total >= 0 and $empresa->total <= 40) badge bg-danger @elseif($empresa->total > 40 and $empresa->total <= 70) badge bg-warning @elseif($empresa->total > 70 and $empresa->total <= 100) badge bg-success @endif">
                                                {{ $empresa->total }}</p>
                                        </td>
                                        <td style="width: 10%">
                                            <a class="btn btn-primary btn-sm text-white"
                                                href="/diagnostico/{{ $empresa->nit }}"><i class="fas fa-info-circle"></i>
                                                Detalle</a>
                                            <!--<a class="btn btn-primary" href="/diagnostico/{{ $empresa->nit }}/analisis" title="Análisis individual"><i class="fas fa-bezier-curve"></i></a>-->
                                        </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <br>
        </div>
    </main>
@endsection
