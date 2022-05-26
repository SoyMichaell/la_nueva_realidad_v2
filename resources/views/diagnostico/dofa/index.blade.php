@extends('layouts.app')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1 class="page__heading">Matriz DOFA</h1>
        </div>
        <div class="section-body">
            @if (count($empresas) <= 0)
                <div class="card">
                    <div class="card-body text-center">No hay registros de análisis por empresa</div>
                </div>
            @else
                <div class="row">
                    @foreach ($empresas as $empresa)
                        <div class="col-md-3">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h4>DOFA</h4>
                                    <div class="card-header-action">
                                        <div class="dropdown">
                                            <a href="#" data-toggle="dropdown"
                                                class="btn btn-warning dropdown-toggle">Opciones</a>
                                            <div class="dropdown-menu">
                                                <a href="#" class="dropdown-item has-icon"><i class="fas fa-eye"></i>
                                                    Ver
                                                    matriz DOFA</a>
                                                <a href="/diagnostico/{{$empresa->nit}}/crear-dofa" class="dropdown-item has-icon"><i class="far fa-edit"></i>
                                                    Crear
                                                    matriz DOFA</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body text-center">
                                    <h6 class="text-dark">{{ $empresa->razon_social }} <br> {{ 'Nit: ' .$empresa->nit }}</h6>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

        </div>
    </section>
@endsection
