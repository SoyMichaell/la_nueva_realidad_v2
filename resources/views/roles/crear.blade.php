@extends('layouts.app')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Roles y permisos</h1>
            <hr>
            <div class="card">
                <div class="card-header">Registro de roles y permisos</div>
                <div class="card-body">
                    <form action="/rol" method="post">
                        <div class="alert alert-info">
                            Nota: Versión prueba plataforma la nueva realidad 2022
                        </div>
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mt-3">
                                <div class="form-group">
                                    <label for="nombre_rol">Rol:</label><span class="text-danger">*</span>
                                    <input id="nombre_rol" type="text"
                                        class="form-control{{ $errors->has('nombre_rol') ? ' is-invalid' : '' }}"
                                        name="nombre_rol" value="{{ old('nombre_rol') }}" autofocus>
                                    @error('nombre_rol')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <label for="">Permisos para este rol:</label>
                                @foreach ($permisosbd as $permiso)
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="permisos_rol[]"
                                            id="flexCheckDefault" value="{{ $permiso->nombre }}">
                                        <label class="form-check-label">{{ $permiso->nombre }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-4 ml-3 mt-4">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        Registrar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
