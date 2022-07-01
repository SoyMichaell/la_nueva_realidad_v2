@extends('layouts.app')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <div class="alert alert-primary">
                <h1 class="mt-4">Implementación estrategias</h1>
                <p>Listado de empresas seleccionadas para la implementación del diseño metodologico</p>
            </div>
            <hr>
            <div class="d-flex justify-content-start mb-3">
                @foreach ($permisos as $permiso)
                    @if ($permiso->permiso == 'ver-asignacion')
                        <a href="{{ url('diagnostico/asignacion') }}" style="text-decoration: none"><i
                                class="fas fa-eye"></i>
                            Distribución empresas x instructor</a>
                    @endif
                @endforeach
            </div>
            <div class="">
                <!--<div class="card-header"><i class="fas fa-table"></i> Tabla microempresarios</div>-->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="p-1" id="SimpleTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nit</th>
                                    <th style="width: ">Razón social</th>
                                    <th>Municipio</th>
                                    <th>CIIU</th>
                                    <th>Instructor asignado</th>
                                    <th>Puntaje</th>
                                    <th>Modalidad</th>
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
                                        <td>{{ $empresa->ciiu_1 }}</td>
                                        <td class="mt-2">
                                            <p
                                                class="{{ $empresa->nombre == '' ? 'badge bg-warning' : 'badge bg-light text-dark' }}">
                                                {{ $empresa->nombre == '' ? 'Sin asignar' : $empresa->nombre . ' ' . $empresa->apellido }}
                                            </p>
                                        </td>
                                        <td>
                                            <p
                                                class="@if ($empresa->total >= 0 and $empresa->total <= 40) badge bg-danger text-white @elseif($empresa->total > 40 and $empresa->total <= 70) badge bg-warning text-white @elseif($empresa->total > 70 and $empresa->total <= 100) badge bg-success text-white @endif">
                                                {{ $empresa->total }}</p>
                                        </td>
                                        <td class="badge bg-light text-dark">{{ Str::ucfirst($empresa->modalidad) }}</td>
                                        @foreach ($permisos as $permiso)
                                            @if ($permiso->permiso == 'completar-analisis')
                                                <td style="width: 5%">
                                                    <div class="btn-group">
                                                        <a class="btn btn-primary btn-sm"
                                                            href="/diagnostico/{{ $empresa->nit }}/analisis"
                                                            title="Análisis microempresa"><i class="fa-solid fa-magnifying-glass-chart"></i></a>
                                                        <a class="btn btn-primary btn-sm" href="/diagnostico/{{$empresa->nit}}/crear-dofa" title="Matriz dofa"><i
                                                                class="fas fa-cube"></i></a>
                                                        <a class="btn btn-primary btn-sm" href="/diagnostico/tablero" title="Tablero de control"><i
                                                                class="fas fa-table"></i></a>
                                                    </div>
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
