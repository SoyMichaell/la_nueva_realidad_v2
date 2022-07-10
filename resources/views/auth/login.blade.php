@extends('layouts.app')

@section('content')
    <style>
        body{
            padding: 0;
            margin: 0;
        }
        .row{
            max-width: 100%;
        }
        .img{
            height: 100vh;
            background-image: url('image/_MG_9252_COMPRESS.jpg');
            background-size: cover;
        }
        img{
            width: 150px;
        }
        .card{
            height: 100vh;
            border: none;
            background: transparent;
        }
        .card-body{
            margin-top: 25%;
        }
        .form-control{
            border: none;
        }
    </style>
    <div class="contenido">
        <div class="row">
            <div class="col-8 img"></div>
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <img class="img-fluid mx-auto d-block" src="{{asset('image/favicon.png')}}" alt="">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group mb-3 mt-3">
                                <input id="correo_institucional" placeholder="Correo electronico" type="email"
                                    class="form-control form-control-lg @error('correo_institucional') is-invalid @enderror"
                                    name="correo_institucional" value="{{ old('correo_institucional') }}" autocomplete="email"
                                    autofocus>
                                @error('correo_institucional')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mt-3 mb-3">
                                <input id="password" placeholder="Contraseña" type="password"
                                    class="form-control form-control-lg @error('password') is-invalid @enderror" name="password"
                                    autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary btn-lg mb-3 w-100">{{ __('Ingresar') }}</button>
                            </div>
                            <hr>
                            <div class="col-12">
                                <a class="text-center mx-auto d-block" href="">Crear cuenta</a>
                            </div>
                        </form>
                    </div>
                </div>
                    
            </div>
        </div>
    </div>
@endsection
