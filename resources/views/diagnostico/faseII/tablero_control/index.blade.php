@extends('layouts.app')

@section('content')

    <head>
        <style>
            input {
                border: none;
            }

            .btn-rounded {
                border-radius: 100%;
                margin-left: 5px;
            }

            .content__objetic {

                max-height: 700px;
                overflow-y: scroll;
                padding: 10px;
            }

            td {
                border: none;
            }

            .card {
                padding: 10px;
                height: 100%;
            }
        </style>
    </head>
    <main>
        <div class="container-fluid">
            <header class="mt-2">
                <div class="alert alert-primary fw-bold" role="alert">
                    Registro de objetivos estratégicos
                </div>
            </header>
            <div class="row mt-2">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Datos microempresa</div>
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item rounded-0">Nit: {{ $empresa->nit }}</li>
                                <li class="list-group-item rounded-0">Razón social: {{ $empresa->razon_social }}</li>
                                <li class="list-group-item rounded-0">Dirección: {{ $empresa->direccion }}</li>
                                <li class="list-group-item rounded-0">Municipio: {{ $empresa->municipio }}</li>
                                <li class="list-group-item rounded-0">Actividad principal: {{ $empresa->ciiu_1 }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <h5>Tablero de control</h5>
                                </div>
                                <div class="col-8 d-flex justify-content-end">
                                    <a class="btn btn-rounded btn-primary" href="/diagnostico/individual"><i
                                            class="fas fa-arrow-left"></i></a>
                                </div>
                            </div>
                            <form action="{{ url("diagnostico/{$empresa->nit}/registroTablero") }}" method="post">
                                @csrf
                                @method('PUT')
                                <table class="table">
                                    <input class="form-control" name="nit" value="{{ $empresa->nit }}" type="hidden"
                                        readonly>
                                    <div class="row">
                                        <div class="col-md-12 mt-2 mb-2">
                                            <label for="perspectiva">Perspectiva</label>
                                            <select class="form-select" name="perspectiva" id="perspectiva">
                                                <option value="">---- Seleccione ----</option>
                                                <option value="Crecimiento y desarrollo">Crecimiento y desarrollo</option>
                                                <option value="Clientes">Clientes</option>
                                                <option value="Procesos internos">Procesos internos</option>
                                                <option value="Financiera">Financiera</option>
                                            </select>
                                        </div>
                                        <div class="col-md-12 mt-2 mb-2">
                                            <label for="objetivo">Objetivo estrategico</label>
                                            <input class="form-control" placeholder="Objetivo" type="text"
                                                name="objetivo">
                                        </div>
                                        <div class="col-md-12 mt-2 mb-2">
                                            <label for="indicador">Indicador</label>
                                            <input class="form-control" placeholder="Indicador" type="text"
                                                name="indicador">
                                        </div>
                                        <div class="col-md-12 mt-2 mb-2">
                                            <label for="meta">Meta</label>
                                            <input class="form-control" placeholder="Meta" type="text" name="meta">
                                        </div>
                                    </div>
                                </table>
                                <div class="d-flex justify-content-start">
                                    <button class="btn btn-primary btn-sm" type="submit">Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    @if ($tableros->count() > 0)
                        <div class="card content__objetic mt-4">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Perspectiva</th>
                                        <th>Objetivo estrategico</th>
                                        <th>Indicador</th>
                                        <th>Meta</th>
                                        <th>--</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($tableros as $tablero)
                                        <tr>
                                            <td style="width: 5%"><input class="form-control form-control-sm" type="text"
                                                    name="id" value="{{ $i++ }}"></td>
                                            <td><input class="form-control form-control-sm" type="text"
                                                    name="perspectiva" value="{{ $tablero->perspectiva }}"></td>
                                            <td><input class="form-control form-control-sm" type="text" name="objetivo"
                                                    value="{{ $tablero->objetivo }}"></td>
                                            <td><input class="form-control form-control-sm" type="text" name="indicador"
                                                    value="{{ $tablero->indicador }}"></td>
                                            <td><input class="form-control form-control-sm" type="text" name="meta"
                                                    value="{{ $tablero->meta }}"></td>
                                            <td>
                                                <a class="btn btn-danger btn-sm"
                                                    href="{{ url("diagnostico/{$tablero->id}/eliminarRegistroTablero") }}"><i
                                                        class="fas fa-eraser"></i> Eliminar</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <form action="{{ url("diagnostico/{$empresa->nit}/validarTablero") }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="d-flex justify-content-start">
                                    <div class="d-grip gap-2 d-md-block">
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#tableroControl">
                                            Visualizar
                                        </button>
                                        <button class="btn btn-info text-white btn-sm" type="submit">Validar
                                            Tablero</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @else
                        <div class="alert alert-warning mt-4">
                            <strong>Tablero de control vacio</strong>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </main>

    <!-- Modal tablero-->
    <div class="modal fade" id="tableroControl" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Objetivos estrategicos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered table-striped">
                        <tr class="bg-warning">
                            <th>#</th>
                            <th>Perspectiva</th>
                            <th>Objetivo</th>
                            <th>Indicador</th>
                            <th>Meta</th>
                        </tr>
                        <?php $i = 1; ?>
                        @foreach ($tableros as $modal)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $modal->perspectiva }}</td>
                                <td>{{ $modal->objetivo }}</td>
                                <td>{{ $modal->indicador }}</td>
                                <td>{{ $modal->meta }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
