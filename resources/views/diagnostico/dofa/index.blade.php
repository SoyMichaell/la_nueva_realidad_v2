@extends('layouts.app')

@section('content')
    <main>
        <div class="container px-4">
            <h1 class="mt-4">Matriz DOFA</h1>
            <p>Foda son las siglas correspondientes a una metodología de análisis que tiene por objetivo proporcionar
                una vista detallada de la estructura interna y externa de una empresa o proyecto. La mayor parte del
                tiempo,el análisis FODA se lleva a cabo siguiendo 4 pasos específicos, como lo son el estudio interno y
                externo, la elaboración de la matriz y el desarrollo de una estrategia completa. Sus siglas FODA
                corresponden a las palabras Fortalezas, Oportunidades, Debilidades y Amenazas.</p>
                <q cite="https://conceptodefinicion.de/matriz-foda/">Definición › M › Economía › Matriz FODA</q>
            <hr>
            <div class="section-body">
                @if (count($empresas) <= 0)
                    <div class="card">
                        <div class="card-body text-center">No hay registros de análisis por empresa</div>
                    </div>
                @else
                    <div class="row">
                        @foreach ($empresas as $empresa)
                            <div class="col-md-4 mt-3 mb-3">
                                <div class="card shadow-sm">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <h6 class="text-dark"> <span
                                                        class="text-primary">{{ $empresa->razon_social }} </span><br>
                                                    {{ 'Nit: ' . $empresa->nit }} <br>
                                                    {{ 'Municipio: ' . $empresa->municipio }} <br>
                                                    {{ 'Investigador: ' . $empresa->nombre . ' ' . $empresa->apellido }}
                                                </h6>
                                            </div>
                                            <div class="col-md-4 d-flex justify-content-end">
                                                <div class="dropdown">
                                                    <button class="btn btn-primary btn-sm dropdown-toggle" type="button"
                                                        id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        Detalle
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                        <li><a class="dropdown-item" href="#"><i
                                                                    class="fas fa-eye"></i>
                                                                Ver
                                                                matriz DOFA</a></li>
                                                        <li><a class="dropdown-item"
                                                                href="/diagnostico/{{ $empresa->nit }}/crear-dofa"><i
                                                                    class="fas fa-cube"></i> Crear
                                                                matriz DOFA</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif

            </div>
    </main>
@endsection
