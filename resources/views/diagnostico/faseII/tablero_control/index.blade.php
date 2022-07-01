@extends('layouts.app')

@section('content')
    <main>
        <div class="w-75 mx-auto">
            <h1 class="mt-4">Formato de Diagnóstico Empresarial</h1>
            <p>Realizar el diagnóstico de la empresa analizando cada una de las perspectivas desarrolladas desde el proyecto
                La Nueva Realidad.</p>
            <hr>
            <div class="card mt-3">
                <div class="card-header">Objetivos e indicadores claves</div>
                <div class="card-body">
                    <form action="{{ url("diagnostico/{$empresa->nit}/registroTablero") }}" method="post">
                        @csrf
                        @method('PUT')
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>Perspectiva</th>
                                    <th>Objetivo estrategico</th>
                                    <th>Indicador</th>
                                    <th>Resulta actual</th>
                                    <th>Meta</th>
                                </tr>
                                <tr>
                                    <td><input class="form-control" name="perspectiva[]" type="text" placeholder=""
                                            value="Crecimiento y desarrollo" readonly></td>
                                    <td><input class="form-control" name="" type="text" placeholder=""></td>
                                    <td><input class="form-control" type="text" placeholder=""></td>
                                    <td><input class="form-control" type="text" placeholder=""></td>
                                    <td><input class="form-control" type="text" placeholder=""></td>
                                </tr>
                                <tr>
                                    <td><input class="form-control" name="perspectiva[]" type="text" placeholder=""
                                            value="Crecimiento y desarrollo" readonly></td>
                                    <td><input class="form-control" name="" type="text" placeholder=""></td>
                                    <td><input class="form-control" type="text" placeholder=""></td>
                                    <td><input class="form-control" type="text" placeholder=""></td>
                                    <td><input class="form-control" type="text" placeholder=""></td>
                                </tr>
                                <tr>
                                    <td><input class="form-control" name="perspectiva[]" type="text" placeholder=""
                                            value="Crecimiento y desarrollo" readonly></td>
                                    <td><input class="form-control" name="" type="text" placeholder=""></td>
                                    <td><input class="form-control" type="text" placeholder=""></td>
                                    <td><input class="form-control" type="text" placeholder=""></td>
                                    <td><input class="form-control" type="text" placeholder=""></td>
                                </tr>
                                <tr>
                                    <td><input class="form-control" name="perspectiva[]" type="text" placeholder=""
                                            value="Clientes" readonly></td>
                                    <td><input class="form-control" name="" type="text" placeholder=""></td>
                                    <td><input class="form-control" type="text" placeholder=""></td>
                                    <td><input class="form-control" type="text" placeholder=""></td>
                                    <td><input class="form-control" type="text" placeholder=""></td>
                                </tr>
                                <tr>
                                    <td><input class="form-control" name="perspectiva[]" type="text" placeholder=""
                                            value="Clientes" readonly></td>
                                    <td><input class="form-control" name="" type="text" placeholder=""></td>
                                    <td><input class="form-control" type="text" placeholder=""></td>
                                    <td><input class="form-control" type="text" placeholder=""></td>
                                    <td><input class="form-control" type="text" placeholder=""></td>
                                </tr>
                                <tr>
                                    <td><input class="form-control" name="perspectiva[]" type="text" placeholder=""
                                            value="Clientes" readonly></td>
                                    <td><input class="form-control" name="" type="text" placeholder=""></td>
                                    <td><input class="form-control" type="text" placeholder=""></td>
                                    <td><input class="form-control" type="text" placeholder=""></td>
                                    <td><input class="form-control" type="text" placeholder=""></td>
                                </tr>
                                <tr>
                                    <td><input class="form-control" name="perspectiva[]" type="text" placeholder=""
                                            value="Procesos internos" readonly></td>
                                    <td><input class="form-control" name="" type="text" placeholder=""></td>
                                    <td><input class="form-control" type="text" placeholder=""></td>
                                    <td><input class="form-control" type="text" placeholder=""></td>
                                    <td><input class="form-control" type="text" placeholder=""></td>
                                </tr>
                                <tr>
                                    <td><input class="form-control" name="perspectiva[]" type="text" placeholder=""
                                            value="Procesos internos" readonly></td>
                                    <td><input class="form-control" name="" type="text" placeholder=""></td>
                                    <td><input class="form-control" type="text" placeholder=""></td>
                                    <td><input class="form-control" type="text" placeholder=""></td>
                                    <td><input class="form-control" type="text" placeholder=""></td>
                                </tr>
                                <tr>
                                    <td><input class="form-control" name="perspectiva[]" type="text" placeholder=""
                                            value="Procesos internos" readonly></td>
                                    <td><input class="form-control" name="" type="text" placeholder=""></td>
                                    <td><input class="form-control" type="text" placeholder=""></td>
                                    <td><input class="form-control" type="text" placeholder=""></td>
                                    <td><input class="form-control" type="text" placeholder=""></td>
                                </tr>
                                <tr>
                                    <td><input class="form-control" name="perspectiva[]" type="text" placeholder=""
                                            value="Financiera" readonly></td>
                                    <td><input class="form-control" name="" type="text" placeholder=""></td>
                                    <td><input class="form-control" type="text" placeholder=""></td>
                                    <td><input class="form-control" type="text" placeholder=""></td>
                                    <td><input class="form-control" type="text" placeholder=""></td>
                                </tr>
                                <tr>
                                    <td><input class="form-control" name="perspectiva[]" type="text" placeholder=""
                                            value="Financiera" readonly></td>
                                    <td><input class="form-control" name="" type="text" placeholder=""></td>
                                    <td><input class="form-control" type="text" placeholder=""></td>
                                    <td><input class="form-control" type="text" placeholder=""></td>
                                    <td><input class="form-control" type="text" placeholder=""></td>
                                </tr>
                                <tr>
                                    <td><input class="form-control" name="perspectiva[]" type="text" placeholder=""
                                            value="Financiera" readonly></td>
                                    <td><input class="form-control" name="" type="text" placeholder=""></td>
                                    <td><input class="form-control" type="text" placeholder=""></td>
                                    <td><input class="form-control" type="text" placeholder=""></td>
                                    <td><input class="form-control" type="text" placeholder=""></td>
                                </tr>
                            </tbody>
                        </table>
                        <button class="btn btn-primary" type="submit">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
