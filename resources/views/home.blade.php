@extends('layouts.app')
<style>
    #chartsperson {
        max-width: 600px;
    }

    .card__welcome {
        width: 100%;
        height: 400px;
        border-radius: 10px;
        box-shadow: 0px 0px 3px 1px rgba(0, 0, 0, 0.31);
    }

    .welcome__header {
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        padding: 10px;
        border-bottom: 1px solid #efefef;
    }

    .circle__img {
        position: absolute;
    }

    .img {
        position: relative;
        width: 70px;
        height: 70px;
        border-radius: 100%;
        top: -15px;
        border: 3px solid gray;
    }

    .circle__img p {
        width: 100px;
    }

    .welcome__body {
        margin: 50px auto;
        border: 1px solid black;
    }

    .avatar__welcome {
        position: relative;
        top: -20px;
    }

    .icon__fon {
        border-radius: 100%;
        padding: 15px;
        background-color: #FF6712;
        cursor: pointer;
    }

    .icon__das {
        color: #fff;
    }

    .icon__fon:hover {
        box-shadow: 0px 0px 3px 1px rgba(0, 0, 0, 0.31);
    }

    .card__activity {
        height: 300px;
        overflow-y: scroll;
    }

    .card__activity li {
        list-style: none;
    }
</style>
@section('content')
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
                    <div class="card card__activity mt-2">
                        <div class="card-body">
                            <p class="text-warning">Actividades mes de Junio</p>
                            <ul>
                                <li>1.5 Capacitar a los aprendices y personal de apoyo que van a apoyar el proceso de con
                                    los empresarios en la aplicación de la metodología</li>
                                <li>1.6 Realizar una prueba piloto de la metodología a implementar.</li>
                                <li>1.7 Analizar los resultados del piloto y realizar los ajustes de ser necesario.</li>
                                <li>1.8 Realizar un análisis de medición de impacto del piloto desarrollado.</li>
                            </ul>
                            <p class="text-primary">Actividades mes de Julio</p>
                            <ul class="list-none">
                                <li>2.1 Implementar con las 35 microempresas las
                                    estrategias orientadas principalmente a la formación y fortalecimiento empresarial de
                                    acuerdo a las perspectivas empresariales financiera, procesos internos, clientes y
                                    crecimiento y desarrollo.</li>
                            </ul>
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
                                            <h4 class="mb-0">({{$cuentaInstructor->count()}})</h4>
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
                                            <h4 class="mb-0">({{$cuentaAprendiz->count()}})</h4>
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
                    <div class="card mt-2">
                        <div class="card-body">
                            <p>Score</p>
                            <canvas id="chartspuntaje"></canvas>
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
