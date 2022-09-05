@extends('layouts.app')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="title-card mt-4">Actualizar microempresa</h1>
            <p>Módulo de actualización de información de la microempresa</p>
            <div class="card">
                <div class="card-header subtitle-card"><i class="fas fa-edit"></i> Editar datos empresa</div>
                <div class="card-body">
                    <form action="/empresa/{{ $empresa->id }}" method="post">
                        <div class="alert alert-info">
                            Nota: Versión prueba plataforma la nueva realidad 2022
                        </div>
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="matricula">Matricula:</label><span class="text-danger"></span>
                                    <input id="matricula" type="text"
                                        class="form-control{{ $errors->has('matricula') ? ' is-invalid' : '' }}"
                                        name="matricula" value="{{ $empresa->matricula }}" autofocus>
                                    <div class="invalid-feedback">
                                        {{ $errors->first('matricula') }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="organizacion">Organización:</label><span class="text-danger"></span>
                                    <input id="organizacion" type="text"
                                        class="form-control{{ $errors->has('organizacion') ? ' is-invalid' : '' }}"
                                        name="organizacion" value="{{ $empresa->organizacion }}" autofocus>
                                    <div class="invalid-feedback">
                                        {{ $errors->first('organizacion') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="categoria">Categoria:</label><span class="text-danger"></span>
                                    <input id="categoria" type="text"
                                        class="form-control{{ $errors->has('categoria') ? ' is-invalid' : '' }}"
                                        name="categoria" value="{{ $empresa->categoria }}" autofocus>
                                    <div class="invalid-feedback">
                                        {{ $errors->first('categoria') }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="razon_social">Razón social:</label><span class="text-danger">*</span>
                                    <input id="razon_social" type="text"
                                        class="form-control{{ $errors->has('razon_social') ? ' is-invalid' : '' }}"
                                        name="razon_social" value="{{ $empresa->razon_social }}" autofocus>
                                    <div class="invalid-feedback">
                                        {{ $errors->first('razon_social') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="identificacion">Identificación:</label><span class="text-danger"></span>
                                    <input id="identificacion" type="text"
                                        class="form-control{{ $errors->has('identificacion') ? ' is-invalid' : '' }}"
                                        name="identificacion" value="{{ $empresa->identificacion }}" autofocus>
                                    <div class="invalid-feedback">
                                        {{ $errors->first('identificacion') }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nit">Nit:</label><span class="text-danger">*</span>
                                    <input id="nit" type="text"
                                        class="form-control{{ $errors->has('nit') ? ' is-invalid' : '' }}" name="nit"
                                        value="{{ $empresa->nit }}" autofocus>
                                    <div class="invalid-feedback">
                                        {{ $errors->first('nit') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fecha_matricula">Fecha matricula:</label><span
                                        class="text-danger"></span>
                                    <input id="fecha_matricula" type="date"
                                        class="form-control{{ $errors->has('fecha_matricula') ? ' is-invalid' : '' }}"
                                        name="fecha_matricula" value="{{ $empresa->fecha_matricula }}" autofocus>
                                    <div class="invalid-feedback">
                                        {{ $errors->first('fecha_matricula') }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fecha_renovacion">Fecha renovación:</label><span
                                        class="text-danger"></span>
                                    <input id="fecha_renovacion" type="date"
                                        class="form-control{{ $errors->has('fecha_renovacion') ? ' is-invalid' : '' }}"
                                        name="fecha_renovacion" value="{{ $empresa->fecha_renovacion }}" autofocus>
                                    <div class="invalid-feedback">
                                        {{ $errors->first('fecha_renovacion') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="direccion">Dirección:</label><span class="text-danger">*</span>
                                    <input id="direccion" type="text"
                                        class="form-control{{ $errors->has('direccion') ? ' is-invalid' : '' }}"
                                        name="direccion" value="{{ $empresa->direccion }}" autofocus>
                                    <div class="invalid-feedback">
                                        {{ $errors->first('direccion') }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="municipio">Municipio:</label><span class="text-danger">*</span>
                                    <input id="municipio" type="text"
                                        class="form-control{{ $errors->has('municipio') ? ' is-invalid' : '' }}"
                                        name="municipio" value="{{ $empresa->municipio }}" autofocus>
                                    <div class="invalid-feedback">
                                        {{ $errors->first('municipio') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="telefono1">Telefono 1:</label><span class="text-danger">*</span>
                                    <input id="telefono1" type="number"
                                        class="form-control{{ $errors->has('telefono1') ? ' is-invalid' : '' }}"
                                        name="telefono1" value="{{ $empresa->telefono1 }}" autofocus>
                                    <div class="invalid-feedback">
                                        {{ $errors->first('telefono1') }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="telefono2">Telefono 2:</label><span class="text-danger"></span>
                                    <input id="telefono2" type="number"
                                        class="form-control{{ $errors->has('telefono2') ? ' is-invalid' : '' }}"
                                        name="telefono2" value="{{ $empresa->telefono2 }}" autofocus>
                                    <div class="invalid-feedback">
                                        {{ $errors->first('telefono2') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="telefono3">Telefono 3:</label><span class="text-danger"></span>
                                    <input id="telefono3" type="number"
                                        class="form-control{{ $errors->has('telefono3') ? ' is-invalid' : '' }}"
                                        name="telefono3" value="{{ $empresa->telefono3 }}" autofocus>
                                    <div class="invalid-feedback">
                                        {{ $errors->first('telefono3') }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="correo">Correo electronico:</label><span class="text-danger">*</span>
                                    <input id="correo" type="email"
                                        class="form-control{{ $errors->has('correo') ? ' is-invalid' : '' }}"
                                        name="correo" value="{{ $empresa->correo }}" autofocus>
                                    <div class="invalid-feedback">
                                        {{ $errors->first('correo') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--ciiu--->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="ciiu_1">CIIU principal:</label><span class="text-danger"></span>
                                    <input id="ciiu_1" type="text"
                                        class="form-control{{ $errors->has('ciiu_1') ? ' is-invalid' : '' }}"
                                        name="ciiu_1" value="{{ $empresa->ciiu_1 }}" autofocus>
                                    <div class="invalid-feedback">
                                        {{ $errors->first('ciiu_1') }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="ciiu_2">CIIU 2:</label><span class="text-danger"></span>
                                    <input id="ciiu_2" type="text"
                                        class="form-control{{ $errors->has('ciiu_2') ? ' is-invalid' : '' }}"
                                        name="ciiu_2" value="{{ $empresa->ciiu_2 }}" autofocus>
                                    <div class="invalid-feedback">
                                        {{ $errors->first('ciiu_2') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="ciiu_3">CIIU_3:</label><span class="text-danger"></span>
                                    <input id="ciiu_3" type="text"
                                        class="form-control{{ $errors->has('ciiu_3') ? ' is-invalid' : '' }}"
                                        name="ciiu_3" value="{{ $empresa->ciiu_3 }}" autofocus>
                                    <div class="invalid-feedback">
                                        {{ $errors->first('ciiu_3') }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="ciiu_4">CIIU_4:</label><span class="text-danger"></span>
                                    <input id="correo" type="text"
                                        class="form-control{{ $errors->has('ciiu_4') ? ' is-invalid' : '' }}"
                                        name="ciiu_4" value="{{ $empresa->ciiu_4 }}" autofocus>
                                    <div class="invalid-feedback">
                                        {{ $errors->first('ciiu_4') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="numero_persona">Número de personas en la empresa:</label><span
                                        class="text-danger"></span>
                                    <input id="numero_persona" type="number"
                                        class="form-control{{ $errors->has('numero_persona') ? ' is-invalid' : '' }}"
                                        name="numero_persona" value="{{ $empresa->numero_persona }}" autofocus>
                                    <div class="invalid-feedback">
                                        {{ $errors->first('numero_persona') }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="activo_total">Total activo:</label><span class="text-danger"></span>
                                    <input id="activo_total" type="number"
                                        class="form-control{{ $errors->has('activo_total') ? ' is-invalid' : '' }}"
                                        name="activo_total" value="{{ $empresa->activo_total }}" autofocus>
                                    <div class="invalid-feedback">
                                        {{ $errors->first('activo_total') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="numero_persona">Tamaño:</label><span class="text-danger"></span>
                                    <select class="form-control" name="tamano" id="tamano">
                                        <option value="">---- SELECCIONE ----</option>
                                        <option value="MICROEMPRESA"
                                            {{ $empresa->tamano == 'MICROEMPRESA' ? 'selected' : '' }}>Microempresa
                                        </option>
                                        <option value="PEQUEÑA" {{ $empresa->tamano == 'PEQUEÑA' ? 'selected' : '' }}>
                                            Pequeña</option>
                                        <option value="MEDIANA" {{ $empresa->tamano == 'MEDIANA' ? 'selected' : '' }}>
                                            Mediana</option>
                                        <option value="GRANDE" {{ $empresa->tamano == 'GRANDE' ? 'selected' : '' }}>
                                            Grande
                                        </option>
                                    </select>
                                    <div class="invalid-feedback">
                                        {{ $errors->first('numero_persona') }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="representante">Nombre completo representante:</label><span
                                        class="text-danger"></span>
                                    <input id="representante" type="text"
                                        class="form-control{{ $errors->has('representante') ? ' is-invalid' : '' }}"
                                        name="representante" value="{{ $empresa->representante }}" autofocus>
                                    <div class="invalid-feedback">
                                        {{ $errors->first('representante') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="autorizacion">Autorización de datos:</label><span
                                        class="text-danger"></span>
                                    <select class="form-control" name="autorizacion" id="autorizacion">
                                        <option value="">---- SELECCIONE ----</option>
                                        <option value="S" {{ $empresa->autorizacion == 'S' ? 'selected' : '' }}>Si
                                        </option>
                                        <option value="N" {{ $empresa->autorizacion == 'N' ? 'selected' : '' }}>No
                                        </option>
                                    </select>
                                    <div class="invalid-feedback">
                                        {{ $errors->first('autorizacion') }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="year">Año:</label><span class="text-danger"></span>
                                    <input id="year" type="text"
                                        class="form-control{{ $errors->has('year') ? ' is-invalid' : '' }}" name="year"
                                        value="{{ $empresa->year }}" autofocus>
                                    <div class="invalid-feedback">
                                        {{ $errors->first('year') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="estado">Estado muestra 375:</label><span class="text-danger">*</span>
                                    <select class="form-select {{ $errors->has('estado') ? ' is-invalid' : '' }}"
                                        name="estado" id="estado">
                                        <option value="">---- SELECCIONE ----</option>
                                        <option value="seleccionado"
                                            {{ $empresa->estado == 'seleccionado' ? 'selected' : '' }}>Seleccionado
                                        </option>
                                        <option value="no seleccionado"
                                            {{ $empresa->estado == 'no seleccionado' ? 'selected' : '' }}>No seleccionado
                                        </option>
                                    </select>
                                    <div class="invalid-feedback">
                                        {{ $errors->first('estado') }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="estado_35">Estado muestra 35:</label><span class="text-danger"></span>
                                    <select class="form-select {{ $errors->has('estado_35') ? ' is-invalid' : '' }}"
                                        name="estado_35" id="estado_35">
                                        <option value="">---- SELECCIONE ----</option>
                                        <option value="seleccionado"
                                            {{ $empresa->estado == 'seleccionado' ? 'selected' : '' }}>Seleccionado
                                        </option>
                                        <option value="no seleccionado"
                                            {{ $empresa->estado == 'no seleccionado' ? 'selected' : '' }}>No seleccionado
                                        </option>
                                    </select>
                                    <div class="invalid-feedback">
                                        {{ $errors->first('estado_35') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-1 ml-3 mt-4">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Actualizar
                                </button>
                            </div>
                        </div>
                </div>
                </form>
            </div>
            <br>
        </div>
    </main>
@endsection
