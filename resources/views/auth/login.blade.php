@extends('layouts.app')

@section('content')
<style>
    body{
        background-image: url('image/_MG_9252_COMPRESS.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        font-size: 16px;
    }
    .card{
        background-color: rgba(0, 0, 100, .1);
        color: #FFF;
    }
    .card-login{
        width: 350px;
        margin: auto;
        margin-top: 22%;
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
                        <div class="row mb-3 mt-2">
                            <div class="col-md-12">
                                <input id="correo_institucional" placeholder="Correo electronico" type="email" class="form-control @error('correo_institucional') is-invalid @enderror" name="correo_institucional" value="{{ old('correo_institucional') }}" autocomplete="email" autofocus>
                                @error('correo_institucional')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3 mt-2">
                            <div class="col-md-12">
                                <input id="password" placeholder="Contraseña" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password">
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
