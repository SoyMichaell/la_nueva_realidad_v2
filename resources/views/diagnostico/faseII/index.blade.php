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

            .buscador {
                width: 100%;
                position: relative;
                left: 0%;
            }
        </style>
    </head>
    <main>
        <div class="container-fluid px-4">
            <div class="card card-custom-content mt-2 border-0">
                <div class="card-content">
                    <h2>Implementación de estrategias</h2>
                </div>
                <br>
                <div class="buscador">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="row">
                                <div class="col-md-1 d-flex justify-content-start align-items-center">Ver</div>
                                <div class="col-md-6 d-flex justify-content-start">
                                    <select class="form-select" name="item" id="item">
                                        <option value="">10</option>
                                        <option value="">25</option>
                                        <option value="">50</option>
                                        <option value="">100</option>
                                    </select>
                                </div>
                                <div class="col-md-2 d-flex justify-content-center align-items-center">Registros</div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end col-md-9">
                            <form action="{{ url('diagnostico/individual') }}" method="get">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input class="form-control" type="search" name="buscar" id="buscar"
                                            value="{{ $texto }}" placeholder="Buscar empresa...">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="table-responsive mt-3">
                    <table class="table-custom" id="SimpleTable">
                        <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>Nit</th>
                                <th style="width: 20%">Razón social</th>
                                <th>Municipio</th>
                                <th style="width: 20%">CIIU</th>
                                <th style="width: 15%;">Instructor</th>
                                <th>Puntaje</th>
                                <th>Modalidad</th>
                                @foreach ($permisos as $permiso)
                                    @if ($permiso->permiso == 'implementacion')
                                        <th>Acciones</th>
                                    @endif
                                @endforeach
                            </tr>
                        </thead>
                        <tbody> 
                            @if($empresas->count()>0)
                            <?php $i = 1; ?>
                            @foreach ($empresas as $empresa)
                                <tr class="text-center">
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
                                    <td><span
                                            class="badge bg-light text-dark">{{ Str::ucfirst($empresa->modalidad) }}</span>
                                    </td>
                                    @foreach ($permisos as $permiso)
                                        @if ($permiso->permiso == 'implementacion')
                                            <td style="width: 5%">
                                                <div class="dropdown">
                                                    <button class="btn" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item"
                                                                href="/diagnostico/{{ $empresa->nit }}/analisis">Análisis
                                                                individual</a></li>
                                                        <li><a class="dropdown-item"
                                                                href="/diagnostico/{{ $empresa->nit }}/imagenCorporativa">Imagen
                                                                corporativa</a></li>
                                                        <li><a class="dropdown-item"
                                                                href="/diagnostico/{{ $empresa->nit }}/crear-dofa">Matriz
                                                                DOFA</a></li>
                                                        <li><a class="dropdown-item"
                                                                href="/diagnostico/{{ $empresa->nit }}/tablero">Tablero
                                                                control</a></li>

                                                    </ul>
                                                </div>
                                            </td>
                                        @endif
                                    @endforeach
                                </tr>
                            @endforeach
                            @else
                                <tr>
                                    <td class="text-center" colspan="9">No se encontraron registros</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
