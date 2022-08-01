@extends('layouts.app')
@section('content')
    <main>
        <div class="container">
            <div class="card mt-2">
                <div class="card-header">Creación de imagen corporativa</div>
                <div class="card-body">
                    <form clas action="" method="post">
                        <div class="row mb-2">
                            <div class="col-12">
                                <label for="">¿Que servicios ofrece?</label>
                                <textarea class="form-control" name="" id="" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-12">
                                <label for="">¿Colores que identifican a la microempresa?</label>
                                <select class="form-control" name="" id="" multiple>
                                    <option value="">Negro</option>
                                    <option value="">Azul</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection