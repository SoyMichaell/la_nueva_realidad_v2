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

        .bg__fondo {
            background: #FFE9D3;
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

        <form action="/diagnostico/{{ $empresa->nit }}/storedofa" method="post">
            @csrf
            @method('PUT')
            <div class="row p-3">
                <table class="table">
                    <thead>
                        <tr>
                            <th>DOFA</th>
                            <th>Fortalezas</th>
                            <th>Debilidades</th>
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
                                        type="text" name="fortaleza1" value="{{ old('fortaleza1') }}">
                                    @error('fortaleza1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-1">
                                    <label for="">2.</label>
                                    <input class="form-control {{ $errors->has('fortaleza2') ? 'is-invalid' : '' }}"
                                        type="text" name="fortaleza2" value="{{ old('fortaleza2') }}">
                                    @error('fortaleza2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-1">
                                    <label for="">3.</label>
                                    <input class="form-control {{ $errors->has('fortaleza3') ? 'is-invalid' : '' }}"
                                        type="text" name="fortaleza3" value="{{ old('fortaleza3') }}">
                                    @error('fortaleza3')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-1">
                                    <label for="">4.</label>
                                    <input class="form-control" type="text" name="fortaleza4"
                                        value="{{ old('fortaleza4') }}">
                                </div>
                                <div class="form-group mb-1">
                                    <label for="">5.</label>
                                    <input class="form-control" type="text" name="fortaleza5"
                                        value="{{ old('fortaleza5') }}">
                                </div>
                            </td>
                            <td>
                                <div class="form-group mb-1">
                                    <label for="">1.</label>
                                    <input class="form-control {{ $errors->has('debilidad1') ? 'is-invalid' : '' }}"
                                        type="text" name="debilidad1" value="{{ old('debilidad1') }}">
                                    @error('debilidad1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-1">
                                    <label for="">2.</label>
                                    <input class="form-control {{ $errors->has('debilidad2') ? 'is-invalid' : '' }}"
                                        type="text" name="debilidad2" value="{{ old('debilidad2') }}">
                                    @error('debilidad2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-1">
                                    <label for="">3.</label>
                                    <input class="form-control {{ $errors->has('debilidad3') ? 'is-invalid' : '' }}"
                                        type="text" name="debilidad3" value="{{ old('debilidad3') }}">
                                    @error('debilidad3')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-1">
                                    <label for="">4.</label>
                                    <input class="form-control" type="text" name="debilidad4"
                                        value="{{ old('debilidad4') }}">
                                </div>
                                <div class="form-group mb-1">
                                    <label for="">5.</label>
                                    <input class="form-control" type="text" name="debilidad5"
                                        value="{{ old('debilidad3') }}">
                                </div>
                            </td>
                        </tr>
                    </tbody>
                    <thead>
                        <tr>
                            <th>Oportunidades</th>
                            <th>Estrategias FO</th>
                            <th>Estrategias DO</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="form-group mb-1">
                                    <label for="">1.</label>
                                    <input
                                        class="form-control {{ $errors->has('oportunidad1') ? 'is-invalid' : '' }}"
                                        type="text" name="oportunidad1" value="{{ old('oportunidad1') }}">
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
                                        type="text" name="oportunidad2" value="{{ old('oportunidad2') }}">
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
                                        type="text" name="oportunidad3" value="{{ old('oportunidad3') }}">
                                    @error('oportunidad3')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-1">
                                    <label for="">4.</label>
                                    <input class="form-control" type="text" name="oportunidad4"
                                        value="{{ old('oportunidad4') }}">
                                </div>
                                <div class="form-group mb-1">
                                    <label for="">5.</label>
                                    <input class="form-control" type="text" name="oportunidad5"
                                        value="{{ old('oportunidad5') }}">
                                </div>
                            </td>
                            <td>
                                <div class="form-group mb-1">
                                    <label for="">1.</label>
                                    <input
                                        class="form-control {{ $errors->has('estrategiafo1') ? 'is-invalid' : '' }}"
                                        type="text" name="estrategiafo1" value="{{ old('estrategiafo1') }}">
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
                                        type="text" name="estrategiafo2" value="{{ old('estrategiafo2') }}">
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
                                        type="text" name="estrategiafo3" value="{{ old('estrategiafo3') }}">
                                    @error('estrategiafo3')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-1">
                                    <label for="">4.</label>
                                    <input class="form-control" type="text" name="estrategiafo4"
                                        value="{{ old('estrategiafo4') }}">
                                </div>
                                <div class="form-group mb-1">
                                    <label for="">5.</label>
                                    <input class="form-control" type="text" name="estrategiafo5"
                                        value="{{ old('estrategiafo5') }}">
                                </div>
                            </td>
                            <td>
                                <div class="form-group mb-1">
                                    <label for="">1.</label>
                                    <input
                                        class="form-control {{ $errors->has('estrategiado1') ? 'is-invalid' : '' }}"
                                        type="text" name="estrategiado1" value="{{ old('estrategiado1') }}">
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
                                        type="text" name="estrategiado2" value="{{ old('estrategiado2') }}">
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
                                        type="text" name="estrategiado3" value="{{ old('estrategiado3') }}">
                                    @error('estrategiado3')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-1">
                                    <label for="">4.</label>
                                    <input class="form-control" type="text" name="estrategiado4"
                                        value="{{ old('estrategiado4') }}">
                                </div>
                                <div class="form-group mb-1">
                                    <label for="">5.</label>
                                    <input class="form-control" type="text" name="estrategiado5"
                                        value="{{ old('estrategiado5') }}">
                                </div>
                            </td>
                        </tr>
                    </tbody>
                    <thead>
                        <th>Amenazas</th>
                        <th>Estrategias FA</th>
                        <th>Estrategias DA</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="form-group mb-1">
                                    <label for="">1.</label>
                                    <input class="form-control {{ $errors->has('amenaza1') ? 'is-invalid' : '' }}"
                                        type="text" name="amenaza1" value="{{ old('amenaza1') }}">
                                    @error('amenaza1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-1">
                                    <label for="">2.</label>
                                    <input class="form-control {{ $errors->has('amenaza2') ? 'is-invalid' : '' }}"
                                        type="text" name="amenaza2" value="{{ old('amenaza2') }}">
                                    @error('amenaza2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-1">
                                    <label for="">3.</label>
                                    <input class="form-control {{ $errors->has('amenaza3') ? 'is-invalid' : '' }}"
                                        type="text" name="amenaza3" value="{{ old('amenaza3') }}">
                                    @error('amenaza3')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-1">
                                    <label for="">4.</label>
                                    <input class="form-control" type="text" name="amenaza4"
                                        value="{{ old('amenaza4') }}">
                                </div>
                                <div class="form-group mb-1">
                                    <label for="">5.</label>
                                    <input class="form-control" type="text" name="amenaza5"
                                        value="{{ old('amenaza5') }}">
                                </div>
                            </td>
                            <td>
                                <div class="form-group mb-1">
                                    <label for="">1.</label>
                                    <input
                                        class="form-control {{ $errors->has('estrategiafa1') ? 'is-invalid' : '' }}"
                                        type="text" name="estrategiafa1" value="{{ old('estrategiafa1') }}">
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
                                        type="text" name="estrategiafa2" value="{{ old('estrategiafa2') }}">
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
                                        type="text" name="estrategiafa3" value="{{ old('estrategiafa3') }}">
                                    @error('estrategiafa3')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-1">
                                    <label for="">4.</label>
                                    <input class="form-control" type="text" name="estrategiafa4"
                                        value="{{ old('estrategiafa4') }}">
                                </div>
                                <div class="form-group mb-1">
                                    <label for="">5.</label>
                                    <input class="form-control" type="text" name="estrategiafa5"
                                        value="{{ old('estrategiafa5') }}">
                                </div>
                            </td>
                            <td>
                                <div class="form-group mb-1">
                                    <label for="">1.</label>
                                    <input
                                        class="form-control {{ $errors->has('estrategiada1') ? 'is-invalid' : '' }}"
                                        type="text" name="estrategiada1" value="{{ old('estrategiada1') }}">
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
                                        type="text" name="estrategiada2" value="{{ old('estrategiada2') }}">
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
                                        type="text" name="estrategiada3" value="{{ old('estrategiada3') }}">
                                    @error('estrategiada3')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-1">
                                    <label for="">4.</label>
                                    <input class="form-control" type="text" name="estrategiada4"
                                        value="{{ old('estrategiada4') }}">
                                </div>
                                <div class="form-group mb-1">
                                    <label for="">5.</label>
                                    <input class="form-control" type="text" name="estrategiada5"
                                        value="{{ old('estrategiada5') }}">
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
@endsection
