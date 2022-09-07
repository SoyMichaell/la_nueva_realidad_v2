@extends('layouts.app')

@section('content')
    <style>
        body {
            padding: 0;
            margin: 0;
        }
    </style>
    <div class="contenido">
        <div class="contenido-login">
            <div class="card-login">
                <div class="title-card text-center mt-3 mb-4">Login</div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group mb-4 mt-4">
                        <input id="correo_institucional" placeholder="Correo electronico" type="email"
                            class="form-control @error('correo_institucional') is-invalid @enderror"
                            name="correo_institucional" value="{{ old('correo_institucional') }}" autocomplete="email"
                            autofocus>
                        @error('correo_institucional')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mt-4 mb-4">
                        <input id="password" placeholder="Contraseña" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password"
                            autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mt-3 mb-3 w-100">{{ __('Ingresar') }}</button>
                    </div>
                    <div class="col-12">
                        <a class="create-account text-center mx-auto d-block" href="">¿Olvido su contraseña?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
