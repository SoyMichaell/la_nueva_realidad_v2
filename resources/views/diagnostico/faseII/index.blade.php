@extends('layouts.app')

@section('content')
<head>
    <style>
        .btn-rounded {
            border: 1px solid #FF6712;
            border-radius: 100%;
        }

        .btn-rounded:hover {
            background-color: #FF6712;
            color: #fff;
        }
    </style>
</head>
    <main>
        <div class="container-fluid px-4">
            <div class="shadow-sm p-3">
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
                                    <th>Razón social</th>
                                    <th>Municipio</th>
                                    <th>CIIU</th>
                                    <th>Instructor asignado</th>
                                    <th>Puntaje</th>
                                    <th>Modalidad</th>
                                    @foreach ($permisos as $permiso)
                                        @if ($permiso->permiso == 'implementacion')
                                            <th>Acciones</th>
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
                                            @if ($permiso->permiso == 'implementacion')
                                                <td style="width: 5%">
                                                    <div class="dropdown">
                                                        <button class="btn" type="button"
                                                            id="dropdownMenuButton" data-toggle="dropdown">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item"
                                                                href="/diagnostico/{{ $empresa->nit }}/analisis">Análisis
                                                                individual</a>
                                                            <a class="dropdown-item"
                                                                href="/diagnostico/{{ $empresa->nit }}/crear-dofa">Matriz
                                                                DOFA</a>
                                                            <a class="dropdown-item"
                                                                href="/diagnostico/{{ $empresa->nit }}/tablero">Tablero
                                                                control</a>
                                                        </div>
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
