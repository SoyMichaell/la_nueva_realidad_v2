@extends('layouts.app')

@section('content')
<style>
    body{
        background-image: url('image/fondo.jpg');
        background-size: cover;
        background-repeat: no-repeat;
    }
    .card-login{
        width: 350px;
        margin: auto;
        margin-top: 20%;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-login">
                <!--<div class="card-header">{{ __('Inicio de sesión') }}</div>-->
                <div class="card-body">
                    <h5 class="text-center fw-bold">Formulario de inicio</h5>
                    <p class="text-center">Ingrese las credenciales para tener acceso a la plataforma</p>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="correo_institucional" class="col-md-12 col-form-label">{{ __('Correo electronico') }}</label>

                            <div class="col-md-12">
                                <input id="correo_institucional" type="email" class="form-control @error('correo_institucional') is-invalid @enderror" name="correo_institucional" value="{{ old('correo_institucional') }}" autocomplete="email" autofocus>

                                @error('correo_institucional')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="password" class="col-md-12 col-form-label">{{ __('Contraseña') }}</label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary w-100">
                                    {{ __('Iniciar sesión') }}
                                </button>
                            </div>
                            <a class="nav-link text-center mt-2" href="">¿Olvidó su contraseña?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
