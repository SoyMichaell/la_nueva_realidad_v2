@extends('layouts.app')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <div class="alert alert-info">
                <h1 class="mt-4">Muestra 35 microempresas</h1>
                <p>Listado de empresas seleccionadas para la implementación del diseño metodologico</p>
            </div>
            <hr>
            <div class="d-flex justify-content-end mb-3">
                @foreach ($permisos as $permiso)
                    @if ($permiso->permiso == 'ver-asignacion')
                        <a class="btn btn-primary btn-sm" href="{{ url('diagnostico/asignacion') }}"><i
                                class="fas fa-eye"></i>
                            Ver asignación</a>
                    @endif
                @endforeach
            </div>
            <div class="card">
                <div class="card-header"><i class="fas fa-table"></i> Tabla microempresarios</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="SimpleTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nit</th>
                                    <th style="width: ">Razón social</th>
                                    <th>Municipio</th>
                                    <th>Instructor asignado</th>
                                    <th>Puntaje</th>
                                    @foreach ($permisos as $permiso)
                                        @if ($permiso->permiso == 'completar-analisis')
                                            <th>----</th>
                                        @endif
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody> <?php $i = 1; ?>
                                @foreach ($empresas as $empresa)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $empresa->nit }}</td>
                                        <td>{{ $empresa->razon_social }}</td>
                                        <td>{{ $empresa->municipio }}</td>
                                        <td>
                                            <p
                                                class="{{ $empresa->nombre == '' ? 'badge bg-warning' : 'badge bg-primary' }}">
                                                {{ $empresa->nombre == '' ? 'Sin asignar' : $empresa->nombre . ' ' . $empresa->apellido }}
                                            </p>
                                        </td>
                                        <td>
                                            <p
                                                class="@if ($empresa->total >= 0 and $empresa->total <= 40) badge bg-danger text-white @elseif($empresa->total > 40 and $empresa->total <= 70) badge bg-warning text-white @elseif($empresa->total > 70 and $empresa->total <= 100) badge bg-success text-white @endif">
                                                {{ $empresa->total }}</p>
                                        </td>
                                        @foreach ($permisos as $permiso)
                                            @if ($permiso->permiso == 'completar-analisis')
                                                <td style="width: 10%">
                                                    <a class="btn btn-secondary btn-sm"
                                                        href="/diagnostico/{{ $empresa->nit }}/analisis"
                                                        title="Análisis individual"><i class="fas fa-edit"></i>
                                                        Completar</a>
                                                </td>
                                            @endif
                                        @endforeach
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
