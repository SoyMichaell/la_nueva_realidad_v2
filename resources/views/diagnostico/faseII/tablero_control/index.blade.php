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
        </style>
    </head>
    <main>
        <div class="container-fluid">
            <div class="content shadow-sm p-3">
                <h1 class="mt-4"><i class="fas fa-dice-d6"></i> Tablero de control</h1>
                <p>Plantear objetivos estrategicos de acuerdo a los hallazgos identificado para cada perspectiva realizada
                    al
                    microempresario, máximo/minimo tres (3) objetivos con su indicador, resultado actual de la empresa, meta
                    o
                    proyección.</p>
            </div>
            <div class="card mt-3 shadow-sm p-3">
                <div class="row">
                    <div class="col-4">
                        <h5>Objetivos e indicadores claves</h5>
                    </div>
                    <div class="col-8 d-flex justify-content-end">
                        <a class="btn btn-rounded btn-primary" href="/diagnostico/individual"><i
                                class="fas fa-arrow-left"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ url("diagnostico/{$empresa->nit}/registroTablero") }}" method="post">
                        @csrf
                        @method('PUT')
                        <table class="table">
                            <input class="form-control" name="nit" value="{{ $empresa->nit }}" type="hidden"
                                readonly>
                            <div class="row mt-2">
                                <div class="col">
                                    <label for="">Perspectiva</label>
                                    <input class="form-control" placeholder="EJ: Crecimiento y desarrollo" type="text"
                                        name="perspectiva" id="">
                                </div>
                                <div class="col">
                                    <label for="">Objetivo estrategico</label>
                                    <input class="form-control" placeholder="Objetivo" type="text" name="objetivo">
                                </div>
                                <div class="col">
                                    <label for="">Indicador</label>
                                    <input class="form-control" placeholder="Indicador" type="text" name="indicador">
                                </div>
                                <div class="col">
                                    <label for="">Meta</label>
                                    <input class="form-control" placeholder="Meta" type="text" name="meta">
                                </div>
                            </div>
                        </table>
                        <button class="btn btn-primary" type="submit">Guardar</button>
                    </form>
                </div>
            </div>
            @if ($tableros->count() > 0)
                <div class=" mt-4">
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
                            @foreach ($tableros as $tablero)
                                <tr>
                                    <td><input type="text" name="id" value="{{ $tablero->id }}"></td>
                                    <td><input type="text" name="perspectiva" value="{{ $tablero->perspectiva }}"></td>
                                    <td><input type="text" name="objetivo" value="{{ $tablero->objetivo }}"></td>
                                    <td><input type="text" name="indicador" value="{{ $tablero->indicador }}"></td>
                                    <td><input type="text" name="meta" value="{{ $tablero->meta }}"></td>
                                    <td>
                                        <a class="btn btn-danger btn-sm"
                                            href="{{ url("diagnostico/{$tablero->id}/eliminarRegistroTablero") }}"><i
                                                class="fas fa-eraser"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="alert alert-warning mt-4">
                    <strong>Tablero de control vacio</strong>
                </div>
            @endif

        </div>
    </main>
@endsection
