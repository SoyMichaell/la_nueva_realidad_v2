@extends('layouts.app')

@section('content')
    <main>
        <div class="container">
            <h1 class="mt-4">Asignación de empresas por municipio</h1>
            <p>Listado de instructores con su asignación correspondiente</p>
            <hr>
            <div class="row">
                @foreach ($personas as $persona)
                    <div class="col-md-4 col-sm-6  card p-3" style="margin-left: 10px">
                        <h5 class="bg-light text-center p-3">{{ $persona->nombre.' '.$persona->apellido }}</h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nit</th>
                                    <th>Razón social</th>
                                    <th>Municipio</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$persona->nit}}</td>
                                    <td>{{$persona->razon_social}}</td>
                                    <td>{{$persona->municipio}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
@endsection
