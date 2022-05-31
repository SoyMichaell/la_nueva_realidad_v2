@extends('layouts.app')

@section('content')
    <main>
        <div class="container px-4">
            <div class="alert alert-info">
                <h1 class="mt-4">Matriz DOFA</h1>
            </div>
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
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <h4>DOFA</h4>
                                            </div>
                                            <div class="col-md-8 d-flex justify-content-end">
                                                <div class="dropdown">
                                                    <button class="btn btn-warning btn-sm dropdown-toggle" type="button"
                                                        id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        Opciones
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                        <li><a class="dropdown-item" href="#"><i
                                                                    class="fas fa-eye"></i> Ver
                                                                matriz DOFA</a></li>
                                                        <li><a class="dropdown-item"
                                                                href="/diagnostico/{{ $empresa->nit }}/crear-dofa"><i class="fas fa-cube"></i> Crear
                                                                matriz DOFA</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body text-center">
                                        <h6 class="text-dark">{{ $empresa->razon_social }} <br>
                                            {{ 'Nit: ' . $empresa->nit }}</h6>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif

            </div>
    </main>
@endsection
