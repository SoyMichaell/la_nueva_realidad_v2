@extends('layouts.app')
@section('content')
@section('css')
    <style>
        .card {
            cursor: pointer;
        }

        .card__amena {
            background: #CFCCCC !important;
            opacity: 0.95;
            color: #fff;
        }

        .card__fo {
            background: linear-gradient(to left, #47C363, #6777EF);
            color: #fff;
        }

        .card__do {
            background: linear-gradient(to left, #FFA426, #6777EF);
            color: #fff;
        }

        .card__fa {
            background: linear-gradient(to left, #47C363, #CFCCCC);
            color: #fff;
        }

        .card__da {
            background: linear-gradient(to left, #FFA426, #CFCCCC);
            color: #fff;
        }

        .bg__fondo{
            background: #FFE9D3;
        }

    </style>
@endsection
<section class="section">
    <div class="section-header">
        <h1 class="page__heading">Crear DOFA</h1>
    </div>
    <div class="section-body">
        <div class="container">
            <form action="" method="post">
                @csrf
                @method('PUT')
                <div class="row bg__fondo p-3">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">DOFA</div>
                            <div class="card-body">
                                El análisis FODA, también conocido como análisis DAFO, es una herramienta de estudio de
                                la
                                situación de una empresa, institución, proyecto o persona, analizando sus
                                características
                                internas y su situación externa en una matriz cuadrada.
                            </div>
                        </div>
                    </div>
                    <!--fortalezas-->
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header bg-light">
                                <h4 class="text-dark">Fortalezas</h4>
                                <div class="card-header-action">
                                    <a data-collapse="#card__fortaleza" class="btn btn-icon btn-light" href="#"><i
                                            class="fas fa-minus"></i></a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="collapse" id="card__fortaleza">
                                    <div class="form-group">
                                        <label for="">1.</label>
                                        <input class="form-control" type="text" name="fortaleza_1" id="">
                                    </div>
                                    <div class="form-group">
                                        <label for="">2.</label>
                                        <input class="form-control" type="text" name="fortaleza_2" id="">
                                    </div>
                                    <div class="form-group">
                                        <label for="">3.</label>
                                        <input class="form-control" type="text" name="fortaleza_3" id="">
                                    </div>
                                    <div class="form-group">
                                        <label for="">4.</label>
                                        <input class="form-control" type="text" name="fortaleza_4" id="">
                                    </div>
                                    <div class="form-group">
                                        <label for="">5.</label>
                                        <input class="form-control" type="text" name="fortaleza_5" id="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--fin-->
                    <!--debilidades-->
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header bg-light">
                                <h4 class="text-dark">Debilidades</h4>
                                <div class="card-header-action">
                                    <a data-collapse="#card__debilidad" class="btn btn-icon btn-light" href="#"><i
                                            class="fas fa-minus"></i></a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="collapse" id="card__debilidad">
                                    <div class="form-group">
                                        <label for="">1.</label>
                                        <input class="form-control" type="text" name="" id="">
                                    </div>
                                    <div class="form-group">
                                        <label for="">2.</label>
                                        <input class="form-control" type="text" name="" id="">
                                    </div>
                                    <div class="form-group">
                                        <label for="">3.</label>
                                        <input class="form-control" type="text" name="" id="">
                                    </div>
                                    <div class="form-group">
                                        <label for="">4.</label>
                                        <input class="form-control" type="text" name="" id="">
                                    </div>
                                    <div class="form-group">
                                        <label for="">5.</label>
                                        <input class="form-control" type="text" name="" id="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--fin-->
                    <!--oportunidades-->
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header bg-light">
                                <h4 class="text-dark">Oportunidades</h4>
                                <div class="card-header-action">
                                    <a data-collapse="#card__oportunidad" class="btn btn-icon btn-light" href="#"><i
                                            class="fas fa-minus"></i></a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="collapse" id="card__oportunidad">
                                    <div class="form-group">
                                        <label for="">1.</label>
                                        <input class="form-control" type="text" name="" id="">
                                    </div>
                                    <div class="form-group">
                                        <label for="">2.</label>
                                        <input class="form-control" type="text" name="" id="">
                                    </div>
                                    <div class="form-group">
                                        <label for="">3.</label>
                                        <input class="form-control" type="text" name="" id="">
                                    </div>
                                    <div class="form-group">
                                        <label for="">4.</label>
                                        <input class="form-control" type="text" name="" id="">
                                    </div>
                                    <div class="form-group">
                                        <label for="">5.</label>
                                        <input class="form-control" type="text" name="" id="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--fin-->
                    <!--estrategias FO-->
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header bg-light">
                                <h4 class="text-dark">Estrategias FO</h4>
                                <div class="card-header-action">
                                    <a data-collapse="#card__estrategia_fo" class="btn btn-icon btn-light" href="#"><i
                                            class="fas fa-minus"></i></a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="collapse" id="card__estrategia_fo">
                                    <div class="form-group">
                                        <label for="">1.</label>
                                        <input class="form-control" type="text" name="" id="">
                                    </div>
                                    <div class="form-group">
                                        <label for="">2.</label>
                                        <input class="form-control" type="text" name="" id="">
                                    </div>
                                    <div class="form-group">
                                        <label for="">3.</label>
                                        <input class="form-control" type="text" name="" id="">
                                    </div>
                                    <div class="form-group">
                                        <label for="">4.</label>
                                        <input class="form-control" type="text" name="" id="">
                                    </div>
                                    <div class="form-group">
                                        <label for="">5.</label>
                                        <input class="form-control" type="text" name="" id="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--fin-->
                    <!--estrategias DO-->
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header bg-light">
                                <h4 class="text-dark">Estrategias DO</h4>
                                <div class="card-header-action">
                                    <a data-collapse="#card__estrategia_do" class="btn btn-icon btn-light" href="#"><i
                                            class="fas fa-minus"></i></a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="collapse" id="card__estrategia_do">
                                    <div class="form-group">
                                        <label for="">1.</label>
                                        <input class="form-control" type="text" name="" id="">
                                    </div>
                                    <div class="form-group">
                                        <label for="">2.</label>
                                        <input class="form-control" type="text" name="" id="">
                                    </div>
                                    <div class="form-group">
                                        <label for="">3.</label>
                                        <input class="form-control" type="text" name="" id="">
                                    </div>
                                    <div class="form-group">
                                        <label for="">4.</label>
                                        <input class="form-control" type="text" name="" id="">
                                    </div>
                                    <div class="form-group">
                                        <label for="">5.</label>
                                        <input class="form-control" type="text" name="" id="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--fin-->
                    <!--amenazas-->
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header bg-light">
                                <h4 class="text-dark">Amenazas</h4>
                                <div class="card-header-action">
                                    <a data-collapse="#card__amena" class="btn btn-icon bg-light" href="#"><i
                                            class="fas fa-minus"></i></a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="collapse" id="card__amena">
                                    <div class="form-group">
                                        <label for="">1.</label>
                                        <input class="form-control" type="text" name="" id="">
                                    </div>
                                    <div class="form-group">
                                        <label for="">2.</label>
                                        <input class="form-control" type="text" name="" id="">
                                    </div>
                                    <div class="form-group">
                                        <label for="">3.</label>
                                        <input class="form-control" type="text" name="" id="">
                                    </div>
                                    <div class="form-group">
                                        <label for="">4.</label>
                                        <input class="form-control" type="text" name="" id="">
                                    </div>
                                    <div class="form-group">
                                        <label for="">5.</label>
                                        <input class="form-control" type="text" name="" id="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--fin-->
                    <!--estrategias FA-->
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header bg-light">
                                <h4 class="text-dark">Estrategias FA</h4>
                                <div class="card-header-action">
                                    <a data-collapse="#card__estrategia_fa" class="btn btn-icon btn-light" href="#"><i
                                            class="fas fa-minus"></i></a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="collapse" id="card__estrategia_fa">
                                    <div class="form-group">
                                        <label for="">1.</label>
                                        <input class="form-control" type="text" name="" id="">
                                    </div>
                                    <div class="form-group">
                                        <label for="">2.</label>
                                        <input class="form-control" type="text" name="" id="">
                                    </div>
                                    <div class="form-group">
                                        <label for="">3.</label>
                                        <input class="form-control" type="text" name="" id="">
                                    </div>
                                    <div class="form-group">
                                        <label for="">4.</label>
                                        <input class="form-control" type="text" name="" id="">
                                    </div>
                                    <div class="form-group">
                                        <label for="">5.</label>
                                        <input class="form-control" type="text" name="" id="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--fin-->
                    <!--estrategias DA-->
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header bg-light">
                                <h4 class="text-dark">Estrategias DA</h4>
                                <div class="card-header-action">
                                    <a data-collapse="#card__estrategia_da" class="btn btn-icon btn-light" href="#"><i
                                            class="fas fa-minus"></i></a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="collapse" id="card__estrategia_da">
                                    <div class="form-group">
                                        <label for="">1.</label>
                                        <input class="form-control" type="text" name="" id="">
                                    </div>
                                    <div class="form-group">
                                        <label for="">2.</label>
                                        <input class="form-control" type="text" name="" id="">
                                    </div>
                                    <div class="form-group">
                                        <label for="">3.</label>
                                        <input class="form-control" type="text" name="" id="">
                                    </div>
                                    <div class="form-group">
                                        <label for="">4.</label>
                                        <input class="form-control" type="text" name="" id="">
                                    </div>
                                    <div class="form-group">
                                        <label for="">5.</label>
                                        <input class="form-control" type="text" name="" id="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--fin-->
                </div>
                <div class="row">
                    <button class="btn btn-primary mt-2" type="submit">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
