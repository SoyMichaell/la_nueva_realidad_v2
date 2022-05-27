@extends('layouts.app')

@section('content')
    <main>
        <div class="container">
            <h1 class="mt-4">Asignación de empresas por municipio</h1>
            <p>Listado de instructores con su asignación correspondiente</p>
            <hr>
            <div class="row">
                @foreach ($personas as $persona)
                    <?php
                    $empresas = DB::table('diagnostico_individual')
                        ->join('empresas', 'diagnostico_individual.nit_empresa', '=', 'empresas.nit')
                        ->where('diagnostico_individual.id_persona', $persona->id)
                        ->get();
                    ?>
                    <div class="col-md-4 col-sm-6 card p-3 mb-3" style="width:425px; margin-left: 10px">
                        <h5 class="bg-light text-center p-3">{{ $persona->nombre . ' ' . $persona->apellido }}</h5>
                        <span class="badge bg-info">{{count($empresas)}}</span>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nit</th>
                                    <th>Razón social</th>
                                    <th>Municipio</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($empresas as $empresa)
                                    <tr>
                                        <td>{{ $empresa->nit }}</td>
                                        <td>{{ $empresa->razon_social }}</td>
                                        <td>{{ $empresa->municipio }}</td>
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
