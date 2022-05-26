@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Formulario de registro') }}</div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="card-body p-4">
                            <div class="alert alert-info">
                                <i class="fas fa-info"></i> Formulario de inscripción personal vinculado (Instructores,
                                Aprendices) al proyecto La Nueva Realidad Fase II:
                                Implementación de soluciones estratégicas y medición de impacto para un grupo de
                                microempresarios de Casanare Código SGPS-10146-2022.
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="tipo_documento" class="col-form-label">{{ __('Tipo de documento') }}<span
                                            class="text-danger">*</span> </label>
                                    <select class="form-select @error('tipo_documento') is-invalid @enderror"
                                        name="tipo_documento" id="tipo_documento">
                                        <option value="">---- SELECCIONE ----</option>
                                        <option value="T.I">Tarjeta de identidad</option>
                                        <option value="C.C">Cedula de ciudadanía</option>
                                        <option value="C.E">Cedula de extranjeria</option>
                                    </select>
                                    @error('tipo_documento')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="numero_documento"
                                        class="col-form-label">{{ __('Número de documento') }}<span
                                            class="text-danger">*</span> </label>
                                    <input id="numero_documento" type="number"
                                        class="form-control @error('numero_documento') is-invalid @enderror"
                                        name="numero_documento" value="{{ old('numero_documento') }}"
                                        autocomplete="numero_documento" autofocus>
                                    @error('numero_documento')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="nombre" class="col-form-label">{{ __('Nombre (s)') }}<span
                                            class="text-danger">*</span> </label>
                                    <input id="nombre" type="text"
                                        class="form-control @error('nombre') is-invalid @enderror" name="nombre"
                                        value="{{ old('nombre') }}" autocomplete="nombre" autofocus>
                                    @error('nombre')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="apellido" class="col-form-label">{{ __('Apellido (s)') }}<span
                                            class="text-danger">*</span> </label>
                                    <input id="apellido" type="text"
                                        class="form-control @error('apellido') is-invalid @enderror" name="apellido"
                                        value="{{ old('apellido') }}" autocomplete="apellido" autofocus>
                                    @error('apellido')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="correo_institucional"
                                        class="col-form-label">{{ __('Correo electronico institucional') }}<span
                                            class="text-danger">*</span> </label>
                                    <input id="correo_institucional" type="email"
                                        class="form-control @error('correo_institucional') is-invalid @enderror"
                                        name="correo_institucional" value="{{ old('correo_institucional') }}"
                                        autocomplete="correo_institucional" autofocus>
                                    @error('correo_institucional')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="correo_personal"
                                        class="col-form-label">{{ __('Correo electronico personal') }} <span
                                            class="text-muted">(Opcional)</span></label>
                                    <input id="correo_personal" type="email"
                                        class="form-control @error('correo_personal') is-invalid @enderror"
                                        name="correo_personal" value="{{ old('correo_personal') }}"
                                        autocomplete="correo_personal" autofocus>
                                    @error('correo_personal')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="password" class="col-form-label">{{ __('Contraseña') }}<span
                                            class="text-danger">*</span> </label>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        value="{{ old('password') }}" autocomplete="password" autofocus>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="confirm_password" class="col-form-label">{{ __('Confirmar contraseña') }}
                                        <span class="text-danger">*</span></label>
                                    <input id="confirm_password" type="password"
                                        class="form-control @error('confirm_password') is-invalid @enderror"
                                        name="confirm_password" value="{{ old('confirm_password') }}"
                                        autocomplete="confirm_password" autofocus>
                                    @error('confirm_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="telefono" class="col-form-label">{{ __('Telefono') }}<span
                                            class="text-danger">*</span> (Si desea ingresar más de un número telefonico,
                                        separarlo por un punto y coma ej: 311111111; 12244444) </label>
                                    <input id="telefono" type="text "
                                        class="form-control @error('telefono') is-invalid @enderror" name="telefono"
                                        value="{{ old('telefono') }}" autocomplete="telefono" autofocus>
                                    @error('telefono')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="nivel_programa" class="col-form-label">{{ __('Nivel de programa') }}<span
                                            class="text-muted">(Opcional)</span> </label>
                                    <select class="form-select @error('nivel_programa') is-invalid @enderror"
                                        name="nivel_programa" id="nivel_programa">
                                        <option value="">---- SELECCIONE ----</option>
                                        <option value="Técnico">Técnico</option>
                                        <option value="Tecnólogo">Tecnólogo</option>
                                        <option value="Operario">Operario</option>
                                    </select>
                                    @error('nivel_programa')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="programa" class="col-form-label">{{ __('Programa de formación') }}<span
                                            class="text-muted">(Opcional)</span></label>
                                    <input id="programa" type="text "
                                        class="form-control @error('programa') is-invalid @enderror" name="programa"
                                        value="{{ old('programa') }}" autocomplete="programa" autofocus>
                                    @error('programa')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="rol" class="col-form-label">{{ __('Tipo de rol') }}<span
                                            class="text-danger">*</span> </label>
                                    <select class="form-select @error('rol') is-invalid @enderror" name="rol" id="rol">
                                        <option value="">---- SELECCIONE ----</option>
                                        @foreach ($roles as $rol)
                                            <option value="{{ $rol->id }}">{{ $rol->nombre_rol }}</option>
                                        @endforeach
                                    </select>
                                    @error('rol')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-primary" type="submit">Registrar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
