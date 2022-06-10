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

        .table__modal td {
            width: 33.3%;
            height: 200px !important;
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
        <div class="card mt-2">
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
                                        <input
                                            class="form-control {{ $errors->has('fortaleza1') ? 'is-invalid' : '' }}"
                                            type="text" name="fortaleza1"
                                            value="{{ $dofa == '' ? '' : $dofa->fortaleza1 }}">
                                        @error('fortaleza1')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-1">
                                        <label for="">2.</label>
                                        <input
                                            class="form-control {{ $errors->has('fortaleza2') ? 'is-invalid' : '' }}"
                                            type="text" name="fortaleza2"
                                            value="{{ $dofa == '' ? '' : $dofa->fortaleza2 }}">
                                        @error('fortaleza2')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-1">
                                        <label for="">3.</label>
                                        <input
                                            class="form-control {{ $errors->has('fortaleza3') ? 'is-invalid' : '' }}"
                                            type="text" name="fortaleza3"
                                            value="{{ $dofa == '' ? '' : $dofa->fortaleza3 }}">
                                        @error('fortaleza3')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-1">
                                        <label for="">4.</label>
                                        <input class="form-control" type="text" name="fortaleza4"
                                            value="{{ $dofa == '' ? '' : $dofa->fortaleza4 }}">
                                    </div>
                                    <div class="form-group mb-1">
                                        <label for="">5.</label>
                                        <input class="form-control" type="text" name="fortaleza5"
                                            value="{{ $dofa == '' ? '' : $dofa->fortaleza5 }}">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group mb-1">
                                        <label for="">1.</label>
                                        <input
                                            class="form-control {{ $errors->has('debilidad1') ? 'is-invalid' : '' }}"
                                            type="text" name="debilidad1"
                                            value="{{ $dofa == '' ? '' : $dofa->debilidad1 }}">
                                        @error('debilidad1')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-1">
                                        <label for="">2.</label>
                                        <input
                                            class="form-control {{ $errors->has('debilidad2') ? 'is-invalid' : '' }}"
                                            type="text" name="debilidad2"
                                            value="{{ $dofa == '' ? '' : $dofa->debilidad2 }}">
                                        @error('debilidad2')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-1">
                                        <label for="">3.</label>
                                        <input
                                            class="form-control {{ $errors->has('debilidad3') ? 'is-invalid' : '' }}"
                                            type="text" name="debilidad3"
                                            value="{{ $dofa == '' ? '' : $dofa->debilidad3 }}">
                                        @error('debilidad3')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-1">
                                        <label for="">4.</label>
                                        <input class="form-control" type="text" name="debilidad4"
                                            value="{{ $dofa == '' ? '' : $dofa->debilidad4 }}">
                                    </div>
                                    <div class="form-group mb-1">
                                        <label for="">5.</label>
                                        <input class="form-control" type="text" name="debilidad5"
                                            value="{{ $dofa == '' ? '' : $dofa->debilidad5 }}">
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
                                            value="{{ $dofa == '' ? '' : $dofa->oportunidad1 }}">
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
                                            value="{{ $dofa == '' ? '' : $dofa->oportunidad2 }}">
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
                                            value="{{ $dofa == '' ? '' : $dofa->oportunidad3 }}">
                                        @error('oportunidad3')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-1">
                                        <label for="">4.</label>
                                        <input class="form-control" type="text" name="oportunidad4"
                                            value="{{ $dofa == '' ? '' : $dofa->oportunidad4 }}">
                                    </div>
                                    <div class="form-group mb-1">
                                        <label for="">5.</label>
                                        <input class="form-control" type="text" name="oportunidad5"
                                            value="{{ $dofa == '' ? '' : $dofa->oportunidad5 }}">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group mb-1">
                                        <label for="">1.</label>
                                        <input
                                            class="form-control {{ $errors->has('estrategiafo1') ? 'is-invalid' : '' }}"
                                            type="text" name="estrategiafo1"
                                            value="{{ $dofa == '' ? '' : $dofa->estrategiafo1 }}">
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
                                            value="{{ $dofa == '' ? '' : $dofa->estrategiafo2 }}">
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
                                            value="{{ $dofa == '' ? '' : $dofa->estrategiafo3 }}">
                                        @error('estrategiafo3')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-1">
                                        <label for="">4.</label>
                                        <input class="form-control" type="text" name="estrategiafo4"
                                            value="{{ $dofa == '' ? '' : $dofa->estrategiafo4 }}">
                                    </div>
                                    <div class="form-group mb-1">
                                        <label for="">5.</label>
                                        <input class="form-control" type="text" name="estrategiafo5"
                                            value="{{ $dofa == '' ? '' : $dofa->estrategiafo5 }}">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group mb-1">
                                        <label for="">1.</label>
                                        <input
                                            class="form-control {{ $errors->has('estrategiado1') ? 'is-invalid' : '' }}"
                                            type="text" name="estrategiado1"
                                            value="{{ $dofa == '' ? '' : $dofa->estrategiado1 }}">
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
                                            value="{{ $dofa == '' ? '' : $dofa->estrategiado2 }}">
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
                                            value="{{ $dofa == '' ? '' : $dofa->estrategiado3 }}">
                                        @error('estrategiado3')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-1">
                                        <label for="">4.</label>
                                        <input class="form-control" type="text" name="estrategiado4"
                                            value="{{ $dofa == '' ? '' : $dofa->estrategiado4 }}">
                                    </div>
                                    <div class="form-group mb-1">
                                        <label for="">5.</label>
                                        <input class="form-control" type="text" name="estrategiado5"
                                            value="{{ $dofa == '' ? '' : $dofa->estrategiado5 }}">
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
                                        <input
                                            class="form-control {{ $errors->has('amenaza1') ? 'is-invalid' : '' }}"
                                            type="text" name="amenaza1"
                                            value="{{ $dofa == '' ? '' : $dofa->amenaza1 }}">
                                        @error('amenaza1')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-1">
                                        <label for="">2.</label>
                                        <input
                                            class="form-control {{ $errors->has('amenaza2') ? 'is-invalid' : '' }}"
                                            type="text" name="amenaza2"
                                            value="{{ $dofa == '' ? '' : $dofa->amenaza2 }}">
                                        @error('amenaza2')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-1">
                                        <label for="">3.</label>
                                        <input
                                            class="form-control {{ $errors->has('amenaza3') ? 'is-invalid' : '' }}"
                                            type="text" name="amenaza3"
                                            value="{{ $dofa == '' ? '' : $dofa->amenaza3 }}">
                                        @error('amenaza3')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-1">
                                        <label for="">4.</label>
                                        <input class="form-control" type="text" name="amenaza4"
                                            value="{{ $dofa == '' ? '' : $dofa->amenaza4 }}">
                                    </div>
                                    <div class="form-group mb-1">
                                        <label for="">5.</label>
                                        <input class="form-control" type="text" name="amenaza5"
                                            value="{{ $dofa == '' ? '' : $dofa->amenaza5 }}">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group mb-1">
                                        <label for="">1.</label>
                                        <input
                                            class="form-control {{ $errors->has('estrategiafa1') ? 'is-invalid' : '' }}"
                                            type="text" name="estrategiafa1"
                                            value="{{ $dofa == '' ? '' : $dofa->estrategiafa1 }}">
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
                                            value="{{ $dofa == '' ? '' : $dofa->estrategiafa2 }}">
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
                                            value="{{ $dofa == '' ? '' : $dofa->estrategiafa3 }}">
                                        @error('estrategiafa3')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-1">
                                        <label for="">4.</label>
                                        <input class="form-control" type="text" name="estrategiafa4"
                                            value="{{ $dofa == '' ? '' : $dofa->estrategiafa4 }}">
                                    </div>
                                    <div class="form-group mb-1">
                                        <label for="">5.</label>
                                        <input class="form-control" type="text" name="estrategiafa5"
                                            value="{{ $dofa == '' ? '' : $dofa->estrategiafa5 }}">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group mb-1">
                                        <label for="">1.</label>
                                        <input
                                            class="form-control {{ $errors->has('estrategiada1') ? 'is-invalid' : '' }}"
                                            type="text" name="estrategiada1"
                                            value="{{ $dofa == '' ? '' : $dofa->estrategiada1 }}">
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
                                            value="{{ $dofa == '' ? '' : $dofa->estrategiada2 }}">
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
                                            value="{{ $dofa == '' ? '' : $dofa->estrategiada3 }}">
                                        @error('estrategiada3')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-1">
                                        <label for="">4.</label>
                                        <input class="form-control" type="text" name="estrategiada4"
                                            value="{{ $dofa == '' ? '' : $dofa->estrategiada4 }}">
                                    </div>
                                    <div class="form-group mb-1">
                                        <label for="">5.</label>
                                        <input class="form-control" type="text" name="estrategiada5"
                                            value="{{ $dofa == '' ? '' : $dofa->estrategiada5 }}">
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="row ml-4">
                        <div class="col-auto">
                            <button class="btn btn-primary btn-sm" type="submit">Guardar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
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
                @if ($dofa != '')
                    <a class="btn btn-warning btn-sm" href="{{ url("diagnostico/{$empresa->nit}/pdfDofa") }}"
                        target="_blank"><i class="fas fa-download"></i> Descargar dofa</a>
                @endif
                <table class="table__modal table-bordered mt-2" style="width: 100%">
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
                                <ol>
                                    <li>{{ $dofa == '' ? '' : $dofa->fortaleza1 }}</li>
                                    <li>{{ $dofa == '' ? '' : $dofa->fortaleza2 }}</li>
                                    <li>{{ $dofa == '' ? '' : $dofa->fortaleza3 }}</li>
                                    <li>{{ $dofa == '' ? '' : $dofa->fortaleza4 }}</li>
                                    <li>{{ $dofa == '' ? '' : $dofa->fortaleza5 }}</li>
                                    </ul>
                            </td>
                            <td class="naranja__content">
                                <ol>
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
                            <td class="azul__content">
                                <ol>
                                    <li>{{ $dofa == '' ? '' : $dofa->oportunidad1 }}</li>
                                    <li>{{ $dofa == '' ? '' : $dofa->oportunidad2 }}</li>
                                    <li>{{ $dofa == '' ? '' : $dofa->oportunidad3 }}</li>
                                    <li>{{ $dofa == '' ? '' : $dofa->oportunidad4 }}</li>
                                    <li>{{ $dofa == '' ? '' : $dofa->oportunidad5 }}</li>
                                    </ul>
                            </td>
                            <td class="purpura__content">
                                <ol>
                                    <li>{{ $dofa == '' ? '' : $dofa->estrategiafo1 }}</li>
                                    <li>{{ $dofa == '' ? '' : $dofa->estrategiafo2 }}</li>
                                    <li>{{ $dofa == '' ? '' : $dofa->estrategiafo3 }}</li>
                                    <li>{{ $dofa == '' ? '' : $dofa->estrategiafo4 }}</li>
                                    <li>{{ $dofa == '' ? '' : $dofa->estrategiafo5 }}</li>
                                    </ul>
                            </td>
                            <td class="purpura__content">
                                <ol>
                                    <li>{{ $dofa == '' ? '' : $dofa->estrategiado1 }}</li>
                                    <li>{{ $dofa == '' ? '' : $dofa->estrategiado2 }}</li>
                                    <li>{{ $dofa == '' ? '' : $dofa->estrategiado3 }}</li>
                                    <li>{{ $dofa == '' ? '' : $dofa->estrategiado4 }}</li>
                                    <li>{{ $dofa == '' ? '' : $dofa->estrategiado5 }}</li>
                                    </ul>
                            </td>
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
                            <td class="amarillo__content">
                                <ol>
                                    <li>{{ $dofa == '' ? '' : $dofa->amenaza1 }}</li>
                                    <li>{{ $dofa == '' ? '' : $dofa->amenaza2 }}</li>
                                    <li>{{ $dofa == '' ? '' : $dofa->amenaza3 }}</li>
                                    <li>{{ $dofa == '' ? '' : $dofa->amenaza4 }}</li>
                                    <li>{{ $dofa == '' ? '' : $dofa->amenaza5 }}</li>
                                    </ul>
                            </td>
                            <td class="purpura__content">
                                <ol>
                                    <li>{{ $dofa == '' ? '' : $dofa->estrategiafa1 }}</li>
                                    <li>{{ $dofa == '' ? '' : $dofa->estrategiafa2 }}</li>
                                    <li>{{ $dofa == '' ? '' : $dofa->estrategiafa3 }}</li>
                                    <li>{{ $dofa == '' ? '' : $dofa->estrategiafa4 }}</li>
                                    <li>{{ $dofa == '' ? '' : $dofa->estrategiafa5 }}</li>
                                    </ul>
                            </td>
                            <td class="purpura__content">
                                <ol>
                                    <li>{{ $dofa == '' ? '' : $dofa->estrategiada1 }}</li>
                                    <li>{{ $dofa == '' ? '' : $dofa->estrategiada2 }}</li>
                                    <li>{{ $dofa == '' ? '' : $dofa->estrategiada3 }}</li>
                                    <li>{{ $dofa == '' ? '' : $dofa->estrategiada4 }}</li>
                                    <li>{{ $dofa == '' ? '' : $dofa->estrategiada5 }}</li>
                                    </ul>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
