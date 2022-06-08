@extends('layouts.app')
<style>
    #chartsperson {
        max-width: 600px;
    }
</style>
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Panel principal</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Principal</li>
            </ol>
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">Usuarios en plataforma ({{ count($users) }})</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="{{ url('usuario') }}">Ver detalles</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body">Empresas muestra general ({{ number_format(count($empresas), 0) }})
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="{{ url('diagnostico/fase1') }}">Ver
                                detalles</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body">Avance aplicación diseño metodologico</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="{{ url('diagnostico/individual') }}">Ver
                                detalles</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <h1 class="mt-4">Graficas principales </h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Graficas | <a href="{{url('charts')}}">Ver más</a></li>
            </ol>
            @include('charts.index')   
        </div>
    </main>
    <br>
@section('js')
    @include('charts.js')    
@endsection

@endsection
