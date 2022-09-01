@extends('layouts.app')

@section('content')
    <main>
        <div class="container-fluid px-4 p-3">
            <div class="card p-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center" colspan="2"><h4>Reportes</h4></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Doc.</th>
                            <th>Descripción</th>
                        </tr>
                        <tr>
                            <td><a class="text-decoration-none" href="{{ url("reporte/pdfEmpresas") }}" target="__blank">Listado asignación empresas por investigador</a></td>
                            <td>Documento de asignación de microempresa por instructores, para la visitas correspondientes</td>
                        </tr>
                        <tr>
                            <td><a class="text-decoration-none" href="">Muestra de estudio (35) microempresas</a></td>
                            <td>Documento informativo de las microempresas en estudio.</td>
                        </tr>
                        <tr>
                            <td><a class="text-decoration-none" href="">Usuario registrados en plataforma</a></td>
                            <td>Listado de usuarios registrados en plataforma (administrador/instructor/investigador/aprendiz)</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
@endsection
