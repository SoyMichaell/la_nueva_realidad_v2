@extends('layouts.app')

@section('content')
    <style>
        body {
            background-size: cover;
            background-repeat: no-repeat;
            font-size: 16px;
            --opacidad-negro: 0.3;
            background-image: linear-gradient(rgba(0, 0, 0, var(--opacidad-negro)), rgba(0, 0, 0, var(--opacidad-negro))), url('image/_MG_9252_COMPRESS.jpg');
        }

        .formulario {
            width: 600px;
            margin: auto;
            margin-top: 60%;
            background-color: rgba(0, 0, 0, 0.1); 
            padding: 20px;
            border-radius: 5px;
        }
    </style>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6">

            </div>
            <div class="col-md-6 mx-auto">
                <div class="formulario d-flex justify-content-start">
                    <form method="POST" class="row g-3" action="{{ route('login') }}">
                        @csrf
                        <h4 class="text-white">¡Bienvenido! Proyecto La Nueva Realidad Fase II</h4>
                        <div class="col-auto">
                            <input id="correo_institucional" placeholder="Correo electronico" type="email"
                                class="form-control form-control-sm @error('correo_institucional') is-invalid @enderror"
                                name="correo_institucional" value="{{ old('correo_institucional') }}" autocomplete="email"
                                autofocus>
                            @error('correo_institucional')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-auto">
                            <input id="password" placeholder="Contraseña" type="password"
                                class="form-control form-control-sm @error('password') is-invalid @enderror" name="password"
                                autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary btn-sm mb-3">{{ __('Ingresar') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
