@extends('layouts.app')

@section('content')
    <main>
        <div class="container-fluid">
            <div class="content shadow-sm p-3 bg-white">
                <h1 class="mt-4">Asignación de empresas por municipio</h1>
                <p>Listado de instructores con su asignación correspondiente</p>
            </div>
            <hr>
            <div class="row">
                @foreach ($personas as $persona)
                    <?php
                    $empresas = DB::table('diagnostico_individual')
                        ->join('empresas', 'diagnostico_individual.nit_empresa', '=', 'empresas.nit')
                        ->where('diagnostico_individual.id_persona', $persona->id)
                        ->get();
                    ?>
                    <div class="col-md-4 col-sm-6 card p-3 mb-3 shadow-sm" style="width:536px; margin-left: 10px; border-top-width: 2px; border-top-color: #0d6efd;">
                        <div class="row">
                            <div class="col-md-11">
                                <h5>{{ $persona->nombre . ' ' . $persona->apellido }}</h5>
                            </div>
                            <div class="col-md-1">
                                <p><span class="badge bg-primary">{{ count($empresas) }}</span></p>
                            </div>
                        </div>
                        <table class="table">
                            <thead>
                                <tr class="">
                                    <th>Nit</th>
                                    <th>Razón social</th>
                                    <th>Municipio</th>
                                    <th>Ver</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($empresas as $empresa)
                                    <tr>
                                        <td>{{ $empresa->nit }}</td>
                                        <td>{{ $empresa->razon_social }}</td>
                                        <td>{{ $empresa->municipio }}</td>
                                        <td><a class="btn"
                                                href="{{ url("diagnostico/{$empresa->nit}/analisis") }}"><i
                                                    class="fas fa-eye"></i></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
@endsection
