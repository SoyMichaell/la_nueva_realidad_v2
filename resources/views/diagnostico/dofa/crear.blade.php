@extends('layouts.app')
@section('content')
@section('css')
    <style>
        .verde__card {
            background: #92D14D !important;
            color: #000;
            font-weight: 300;
            text-transform: uppercase;
        }

        .verde__content {
            background: #D8E4BC !important;
        }

        .naranja__card {
            background: #E36B0A !important;
            color: #000;
            font-weight: 300;
            text-transform: uppercase;
        }

        .naranja__content {
            background: #F9BF8F !important;
        }

        .azul__card {
            background: #96B3D6 !important;
            color: #000;
            font-weight: 300;
            text-transform: uppercase;
        }

        .azul__content {
            background: #DCE6F0 !important;
        }

        .purpura__card {
            background: #E3DFED !important;
            color: #000;
            font-weight: 300;
            text-transform: uppercase;
        }

        .purpura__content {
            background: #E3DFED !important;
        }

        .amarillo__card {
            background: #FFFF01 !important;
            color: #000;
            font-weight: 300;
            text-transform: uppercase;
        }

        .amarillo__content {
            background: #FFFF67 !important;
        }

        .table-bordered {
            border: 2px solid #000 !important;
        }
    </style>
@endsection
<main>
    <div class="container">
        <h1 class="mt-4"><i class="fab fa-buromobelexperte"></i> Creando dofa...</h1>
        <p>Para dar cumplimiento al desarrollo de la matriz DOFA de la microempresa correspondiente debe ingresar minimo
            tres (3) y máximo cinco (5) Fortalezas, Debilidades, Oportunidades, Estrategias FO, Estrategias DO,
            Amenazas, Estrategias FA, Estrategias DA. <br> <span class="text-danger">Nota: El sistemas no le permitira
                guardar si no cumple con el requisito de las tres (3) minimo.</span></p>
        <hr>
        <div class="d-flex">
            <a class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#Dofa"><i class="fas fa-eye"></i>
                Visualizar DOFA</a>
        </div>
        <form action="/diagnostico/{{ $empresa->nit }}/storedofa" method="post">
            @csrf
            @method('PUT')
            <div class="row p-3">
                <table class="table">
                    <thead>
                        <tr>
                            <td>DOFA</td>
                            <td>Fortalezas</td>
                            <td>Debilidades</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <label for="">Nit empresa</label>
                                <input class="form-control" name="nit" type="text" value="{{ $empresa->nit }}"
                                    readonly>
                                <label class="mt-2" for="">Razón social</label>
                                <input class="form-control" name="razon_social" type="text"
                                    value="{{ $empresa->razon_social }}" readonly>
                            </td>
                            <td>
                                <div class="form-group mb-1">
                                    <label for="">1.</label>
                                    <input class="form-control {{ $errors->has('fortaleza1') ? 'is-invalid' : '' }}"
                                        type="text" name="fortaleza1"
                                        value="{{ ($dofa == '' ? old('fortaleza1') : $dofa->fortaleza1) == '' ?: $dofa->fortaleza1 }}">
                                    @error('fortaleza1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-1">
                                    <label for="">2.</label>
                                    <input class="form-control {{ $errors->has('fortaleza2') ? 'is-invalid' : '' }}"
                                        type="text" name="fortaleza2"
                                        value="{{ ($dofa == '' ? old('fortaleza2') : $dofa->fortaleza2) == '' ?: $dofa->fortaleza2 }}">
                                    @error('fortaleza2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-1">
                                    <label for="">3.</label>
                                    <input class="form-control {{ $errors->has('fortaleza3') ? 'is-invalid' : '' }}"
                                        type="text" name="fortaleza3"
                                        value="{{ ($dofa == '' ? old('fortaleza3') : $dofa->fortaleza3) == '' ?: $dofa->fortaleza3 }}">
                                    @error('fortaleza3')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-1">
                                    <label for="">4.</label>
                                    <input class="form-control" type="text" name="fortaleza4"
                                        value="{{ ($dofa == '' ? old('fortaleza4') : $dofa->fortaleza4) == '' ?: $dofa->fortaleza4 }}">
                                </div>
                                <div class="form-group mb-1">
                                    <label for="">5.</label>
                                    <input class="form-control" type="text" name="fortaleza5"
                                        value="{{ ($dofa == '' ? old('fortaleza5') : $dofa->fortaleza5) == '' ?: $dofa->fortaleza5 }}">
                                </div>
                            </td>
                            <td>
                                <div class="form-group mb-1">
                                    <label for="">1.</label>
                                    <input class="form-control {{ $errors->has('debilidad1') ? 'is-invalid' : '' }}"
                                        type="text" name="debilidad1"
                                        value="{{ ($dofa == '' ? old('debilidad1') : $dofa->debilidad1) == '' ?: $dofa->debilidad1 }}">
                                    @error('debilidad1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-1">
                                    <label for="">2.</label>
                                    <input class="form-control {{ $errors->has('debilidad2') ? 'is-invalid' : '' }}"
                                        type="text" name="debilidad2"
                                        value="{{ ($dofa == '' ? old('debilidad2') : $dofa->debilidad2) == '' ?: $dofa->debilidad2 }}">
                                    @error('debilidad2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-1">
                                    <label for="">3.</label>
                                    <input class="form-control {{ $errors->has('debilidad3') ? 'is-invalid' : '' }}"
                                        type="text" name="debilidad3"
                                        value="{{ ($dofa == '' ? old('debilidad3') : $dofa->debilidad3) == '' ?: $dofa->debilidad3 }}">
                                    @error('debilidad3')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-1">
                                    <label for="">4.</label>
                                    <input class="form-control" type="text" name="debilidad4"
                                        value="{{ ($dofa == '' ? old('debilidad4') : $dofa->debilidad4) == '' ?: $dofa->debilidad4 }}">
                                </div>
                                <div class="form-group mb-1">
                                    <label for="">5.</label>
                                    <input class="form-control" type="text" name="debilidad5"
                                        value="{{ ($dofa == '' ? old('debilidad5') : $dofa->debilidad5) == '' ?: $dofa->debilidad5 }}">
                                </div>
                            </td>
                        </tr>
                    </tbody>
                    <thead>
                        <tr>
                            <td>Oportunidades</td>
                            <td>Estrategias FO</td>
                            <td>Estrategias DO</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="form-group mb-1">
                                    <label for="">1.</label>
                                    <input
                                        class="form-control {{ $errors->has('oportunidad1') ? 'is-invalid' : '' }}"
                                        type="text" name="oportunidad1"
                                        value="{{ ($dofa == '' ? old('oportunidad1') : $dofa->oportunidad1) == '' ?: $dofa->oportunidad1 }}">
                                    @error('oportunidad1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-1">
                                    <label for="">2.</label>
                                    <input
                                        class="form-control {{ $errors->has('oportunidad2') ? 'is-invalid' : '' }}"
                                        type="text" name="oportunidad2"
                                        value="{{ ($dofa == '' ? old('oportunidad2') : $dofa->oportunidad2) == '' ?: $dofa->oportunidad2 }}">
                                    @error('oportunidad2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-1">
                                    <label for="">3.</label>
                                    <input
                                        class="form-control {{ $errors->has('oportunidad3') ? 'is-invalid' : '' }}"
                                        type="text" name="oportunidad3"
                                        value="{{ ($dofa == '' ? old('oportunidad3') : $dofa->oportunidad3) == '' ?: $dofa->oportunidad3 }}">
                                    @error('oportunidad3')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-1">
                                    <label for="">4.</label>
                                    <input class="form-control" type="text" name="oportunidad4"
                                        value="{{ ($dofa == '' ? old('oportunidad4') : $dofa->oportunidad4) == '' ?: $dofa->oportunidad4 }}">
                                </div>
                                <div class="form-group mb-1">
                                    <label for="">5.</label>
                                    <input class="form-control" type="text" name="oportunidad5"
                                        value="{{ ($dofa == '' ? old('oportunidad5') : $dofa->oportunidad5) == '' ?: $dofa->oportunidad5 }}">
                                </div>
                            </td>
                            <td>
                                <div class="form-group mb-1">
                                    <label for="">1.</label>
                                    <input
                                        class="form-control {{ $errors->has('estrategiafo1') ? 'is-invalid' : '' }}"
                                        type="text" name="estrategiafo1"
                                        value="{{ ($dofa == '' ? old('estrategiafo1') : $dofa->estrategiafo1) == '' ?: $dofa->estrategiafo1 }}">
                                    @error('estrategiafo1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-1">
                                    <label for="">2.</label>
                                    <input
                                        class="form-control {{ $errors->has('estrategiafo2') ? 'is-invalid' : '' }}"
                                        type="text" name="estrategiafo2"
                                        value="{{ ($dofa == '' ? old('estrategiafo2') : $dofa->estrategiafo2) == '' ?: $dofa->estrategiafo2 }}">
                                    @error('estrategiafo2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-1">
                                    <label for="">3.</label>
                                    <input
                                        class="form-control {{ $errors->has('estrategiafo3') ? 'is-invalid' : '' }}"
                                        type="text" name="estrategiafo3"
                                        value="{{ ($dofa == '' ? old('estrategiafo3') : $dofa->estrategiafo3) == '' ?: $dofa->estrategiafo3 }}">
                                    @error('estrategiafo3')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-1">
                                    <label for="">4.</label>
                                    <input class="form-control" type="text" name="estrategiafo4"
                                        value="{{ ($dofa == '' ? old('estrategiafo4') : $dofa->estrategiafo4) == '' ?: $dofa->estrategiafo4 }}">
                                </div>
                                <div class="form-group mb-1">
                                    <label for="">5.</label>
                                    <input class="form-control" type="text" name="estrategiafo5"
                                        value="{{ ($dofa == '' ? old('estrategiafo5') : $dofa->estrategiafo5) == '' ?: $dofa->estrategiafo5 }}">
                                </div>
                            </td>
                            <td>
                                <div class="form-group mb-1">
                                    <label for="">1.</label>
                                    <input
                                        class="form-control {{ $errors->has('estrategiado1') ? 'is-invalid' : '' }}"
                                        type="text" name="estrategiado1"
                                        value="{{ ($dofa == '' ? old('estrategiado1') : $dofa->estrategiado1) == '' ?: $dofa->estrategiado1 }}">
                                    @error('estrategiado1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-1">
                                    <label for="">2.</label>
                                    <input
                                        class="form-control {{ $errors->has('estrategiado2') ? 'is-invalid' : '' }}"
                                        type="text" name="estrategiado2"
                                        value="{{ ($dofa == '' ? old('estrategiado2') : $dofa->estrategiado2) == '' ?: $dofa->estrategiado2 }}">
                                    @error('estrategiado2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-1">
                                    <label for="">3.</label>
                                    <input
                                        class="form-control {{ $errors->has('estrategiado3') ? 'is-invalid' : '' }}"
                                        type="text" name="estrategiado3"
                                        value="{{ ($dofa == '' ? old('estrategiado3') : $dofa->estrategiado3) == '' ?: $dofa->estrategiado3 }}">
                                    @error('estrategiado3')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-1">
                                    <label for="">4.</label>
                                    <input class="form-control" type="text" name="estrategiado4"
                                        value="{{ ($dofa == '' ? old('estrategiado4') : $dofa->estrategiado4) == '' ?: $dofa->estrategiado4 }}">
                                </div>
                                <div class="form-group mb-1">
                                    <label for="">5.</label>
                                    <input class="form-control" type="text" name="estrategiado5"
                                        value="{{ ($dofa == '' ? old('estrategiado5') : $dofa->estrategiado5) == '' ?: $dofa->estrategiado5 }}">
                                </div>
                            </td>
                        </tr>
                    </tbody>
                    <thead>
                        <td>Amenazas</td>
                        <td>Estrategias FA</td>
                        <td>Estrategias DA</td>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="form-group mb-1">
                                    <label for="">1.</label>
                                    <input class="form-control {{ $errors->has('amenaza1') ? 'is-invalid' : '' }}"
                                        type="text" name="amenaza1"
                                        value="{{ ($dofa == '' ? old('amenaza1') : $dofa->amenaza1) == '' ?: $dofa->amenaza1 }}">
                                    @error('amenaza1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-1">
                                    <label for="">2.</label>
                                    <input class="form-control {{ $errors->has('amenaza2') ? 'is-invalid' : '' }}"
                                        type="text" name="amenaza2"
                                        value="{{ ($dofa == '' ? old('amenaza2') : $dofa->amenaza2) == '' ?: $dofa->amenaza2 }}">
                                    @error('amenaza2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-1">
                                    <label for="">3.</label>
                                    <input class="form-control {{ $errors->has('amenaza3') ? 'is-invalid' : '' }}"
                                        type="text" name="amenaza3"
                                        value="{{ ($dofa == '' ? old('amenaza3') : $dofa->amenaza3) == '' ?: $dofa->amenaza3 }}">
                                    @error('amenaza3')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-1">
                                    <label for="">4.</label>
                                    <input class="form-control" type="text" name="amenaza4"
                                        value="{{ ($dofa == '' ? old('amenaza4') : $dofa->amenaza4) == '' ?: $dofa->amenaza4 }}">
                                </div>
                                <div class="form-group mb-1">
                                    <label for="">5.</label>
                                    <input class="form-control" type="text" name="amenaza5"
                                        value="{{ ($dofa == '' ? old('amenaza5') : $dofa->amenaza5) == '' ?: $dofa->amenaza5 }}">
                                </div>
                            </td>
                            <td>
                                <div class="form-group mb-1">
                                    <label for="">1.</label>
                                    <input
                                        class="form-control {{ $errors->has('estrategiafa1') ? 'is-invalid' : '' }}"
                                        type="text" name="estrategiafa1"
                                        value="{{ ($dofa == '' ? old('estrategiafa1') : $dofa->estrategiafa1) == '' ?: $dofa->estrategiafa1 }}">
                                    @error('estrategiafa1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-1">
                                    <label for="">2.</label>
                                    <input
                                        class="form-control {{ $errors->has('estrategiafa2') ? 'is-invalid' : '' }}"
                                        type="text" name="estrategiafa2"
                                        value="{{ ($dofa == '' ? old('estrategiafa2') : $dofa->estrategiafa2) == '' ?: $dofa->estrategiafa2 }}">
                                    @error('estrategiafa2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-1">
                                    <label for="">3.</label>
                                    <input
                                        class="form-control {{ $errors->has('estrategiafa3') ? 'is-invalid' : '' }}"
                                        type="text" name="estrategiafa3"
                                        value="{{ ($dofa == '' ? old('estrategiafa3') : $dofa->estrategiafa3) == '' ?: $dofa->estrategiafa3 }}">
                                    @error('estrategiafa3')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-1">
                                    <label for="">4.</label>
                                    <input class="form-control" type="text" name="estrategiafa4"
                                        value="{{ ($dofa == '' ? old('estrategiafa4') : $dofa->estrategiafa4) == '' ?: $dofa->estrategiafa4 }}">
                                </div>
                                <div class="form-group mb-1">
                                    <label for="">5.</label>
                                    <input class="form-control" type="text" name="estrategiafa5"
                                        value="{{ ($dofa == '' ? old('estrategiafa5') : $dofa->estrategiafa5) == '' ?: $dofa->estrategiafa5 }}">
                                </div>
                            </td>
                            <td>
                                <div class="form-group mb-1">
                                    <label for="">1.</label>
                                    <input
                                        class="form-control {{ $errors->has('estrategiada1') ? 'is-invalid' : '' }}"
                                        type="text" name="estrategiada1"
                                        value="{{ ($dofa == '' ? old('estrategiada1') : $dofa->estrategiada1) == '' ?: $dofa->estrategiada1 }}">
                                    @error('estrategiada1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-1">
                                    <label for="">2.</label>
                                    <input
                                        class="form-control {{ $errors->has('estrategiada2') ? 'is-invalid' : '' }}"
                                        type="text" name="estrategiada2"
                                        value="{{ ($dofa == '' ? old('estrategiada2') : $dofa->estrategiada2) == '' ?: $dofa->estrategiada2 }}">
                                    @error('estrategiada2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-1">
                                    <label for="">3.</label>
                                    <input
                                        class="form-control {{ $errors->has('estrategiada3') ? 'is-invalid' : '' }}"
                                        type="text" name="estrategiada3"
                                        value="{{ ($dofa == '' ? old('estrategiada3') : $dofa->estrategiada3) == '' ?: $dofa->estrategiada3 }}">
                                    @error('estrategiada3')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-1">
                                    <label for="">4.</label>
                                    <input class="form-control" type="text" name="estrategiada4"
                                        value="{{ ($dofa == '' ? old('estrategiada4') : $dofa->estrategiada4) == '' ?: $dofa->estrategiada4 }}">
                                </div>
                                <div class="form-group mb-1">
                                    <label for="">5.</label>
                                    <input class="form-control" type="text" name="estrategiada5"
                                        value="{{ ($dofa == '' ? old('estrategiada5') : $dofa->estrategiada5) == '' ?: $dofa->estrategiada5 }}">
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="row ml-4">
                <div class="col-auto">
                    <button class="btn btn-primary" type="submit">Guardar</button>
                </div>
            </div>
        </form>
    </div>
    <br>
</main>

<!-- Modal -->
<div class="modal fade" id="Dofa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Visualización matriz DOFA O FODA</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Est ab dignissimos officia nam! Pariatur
                    facere nesciunt fuga corrupti quis similique culpa illo illum voluptatibus dolorum tempora, cumque
                    quam eveniet consequatur!
                    Voluptate tempore velit neque eaque animi odit autem architecto rerum eius exercitationem atque
                    maiores iusto sit ullam, id magni? Ratione repellat expedita earum quaerat vero id. Eos provident
                    nulla odio.
                    Doloremque dolorum magnam praesentium! Possimus illum quod omnis exercitationem iusto aliquid
                    inventore expedita esse asperiores reprehenderit dignissimos cupiditate vel harum dolorum
                    consequuntur voluptatem a, molestiae distinctio sint ipsum repudiandae hic.
                    Consectetur cumque, quibusdam ipsa consequuntur, cum nihil quis debitis, delectus nostrum rem earum
                    iste maxime? Accusamus quis hic sunt nihil saepe nesciunt eaque. Recusandae tempore corrupti, nam
                    ipsum sunt et.</p>
                <table class="table-bordered" style="width: 100%">
                    <tbody>
                        <tr class="text-center">
                            <th class="bg-primary text-white">--</td>
                            <th class="verde__card">Fortalezas</td>
                            <th class="naranja__card">Debilidades</td>
                        </tr>
                    </tbody>
                    <tbody>
                        <tr>
                            <td>
                                <h2 class="text-center">Matriz DOFA</h2>
                            </td>
                            <td class="verde__content">
                                <ul>
                                    <li>{{ $dofa == '' ? '' : $dofa->fortaleza1 }}</li>
                                    <li>{{ $dofa == '' ? '' : $dofa->fortaleza2 }}</li>
                                    <li>{{ $dofa == '' ? '' : $dofa->fortaleza3 }}</li>
                                    <li>{{ $dofa == '' ? '' : $dofa->fortaleza4 }}</li>
                                    <li>{{ $dofa == '' ? '' : $dofa->fortaleza5 }}</li>
                                </ul>
                            </td>
                            <td class="naranja__content">
                                <ul>
                                    <li>{{ $dofa == '' ? '' : $dofa->debilidad1 }}</li>
                                    <li>{{ $dofa == '' ? '' : $dofa->debilidad2 }}</li>
                                    <li>{{ $dofa == '' ? '' : $dofa->debilidad3 }}</li>
                                    <li>{{ $dofa == '' ? '' : $dofa->debilidad4 }}</li>
                                    <li>{{ $dofa == '' ? '' : $dofa->debilidad5 }}</li>
                                </ul>
                            </td>
                        </tr>
                    </tbody>
                    <tbody>
                        <tr class="text-center">
                            <th class="azul__card">Oportunidades</td>
                            <th class="purpura__card">Estrategias FO</td>
                            <th class="purpura__card">Estrategias DO</td>
                        </tr>
                    </tbody>
                    <tbody>
                        <tr>
                            <td class="azul__content">Oportunidades minimo 3</td>
                            <td class="purpura__content">Estrategias FO 3 minimo</td>
                            <td class="purpura__content">Estrategias DO 3 minimo</td>
                        </tr>
                    </tbody>
                    <tbody>
                        <tr class="text-center">
                            <th class="amarillo__card">Amenazas</td>
                            <th class="purpura__card">Estrategias FA</td>
                            <th class="purpura__card">Estrategias DA</td>
                        </tr>
                        </thead>
                    <tbody>
                        <tr>
                            <td class="amarillo__content">Amenazas minimo 3</td>
                            <td class="purpura__content">Estrategias Fa minimo 3</td>
                            <td class="purpura__content">Estrategias DA minimo 3</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
