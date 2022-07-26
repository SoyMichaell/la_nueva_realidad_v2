@extends('layouts.app')
@section('content')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <main>
        <div class="container-fluid px-4">
            <h5 class="mt-3 mb-4 text-uppercase">Dashboard</h5>
            <div class="row">
                <div class="col-xl-4">
                    <div class="card overflow-hidden">
                        <div class="bg-primary bg-soft">
                            <div class="row">
                                <div class="col-12">
                                    <div class="text-white p-3">
                                        <h5 class="text-white">Bienvenido!</h5>
                                        <p>Dashboard</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="avatar__welcome mb-4">
                                        <img src="{{ asset('image/logo.png') }}" alt=""
                                            class="img-thumbnail rounded-circle">
                                    </div>
                                    <h5 class="font-size-15 text-truncate">{{ Auth::user()->nombre }}</h5>
                                    <p class="text-muted mb-0 text-truncate">Administrador</p>
                                </div>
                                <div class="col-sm-8">
                                    <div class="pt-4">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h5 class="font-size-15">(0)</h5>
                                                <p class="text-muted mb-0">Empresas asig.</p>
                                            </div>
                                            <div class="col-sm-6">
                                                <h5 class="font-size-15">
                                                    ({{ Auth::user()->programa == '' ? '-' : Auth::user()->programa }})
                                                </h5>
                                                <p class="text-muted mb-0">Programa</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-muted fw-medium">Instructores</p>
                                            <h4 class="mb-0">({{ $cuentaInstructor->count() }})</h4>
                                        </div>
                                        <div class="flex-shrink-0 align-self-center icon__fon">
                                            <div class="rounded-circle">
                                                <span class="icon__das rounded-circle">
                                                    <i class="far fa-user"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-muted fw-medium">Investigadores</p>
                                            <h4 class="mb-0">()</h4>
                                        </div>
                                        <div class="flex-shrink-0 align-self-center icon__fon">
                                            <div class="rounded-circle">
                                                <span class="icon__das rounded-circle">
                                                    <i class="fas fa-search"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-muted fw-medium">Aprendices</p>
                                            <h4 class="mb-0">({{ $cuentaAprendiz->count() }})</h4>
                                        </div>
                                        <div class="flex-shrink-0 align-self-center icon__fon">
                                            <div class="rounded-circle">
                                                <span class="icon__das rounded-circle">
                                                    <i class="fas fa-chalkboard-teacher"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card mt-2">
                                <div class="card-body">
                                    <p>Usuarios en plataforma</p>
                                    <div id="graficoUsuario"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mt-2">
                                <div class="card-body">
                                    <p>Muestra por municipio</p>
                                    <div id="graficoMunicipio"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@section('js')
    @include('charts/js.js')
@endsection
@endsection
