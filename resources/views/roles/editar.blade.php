@extends('layouts.app')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Roles y permisos</h1>
            <hr>
            <div class="card">
                <div class="card-header">Registro de roles y permisos</div>
                <div class="card-body">
                    <form action="/rol/{{$rol->id}}" method="post">
                        <div class="alert alert-info">
                            Nota: Versión prueba plataforma la nueva realidad 2022
                        </div>
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12 mt-3">
                                <div class="form-group">
                                    <label for="nombre_rol">Rol:</label><span class="text-danger">*</span>
                                    <input id="nombre_rol" type="text"
                                        class="form-control{{ $errors->has('nombre_rol') ? ' is-invalid' : '' }}"
                                        name="nombre_rol" value="{{ $rol->nombre_rol }}" autofocus disabled>
                                    <div class="invalid-feedback">
                                        {{ $errors->first('nombre_rol') }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <label for="">Permisos para este rol:</label>
                                @foreach ($permisosbd as $permiso)
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="permisos_rol[]"
                                            id="flexCheckDefault"
                                            @foreach ($has_rol_permiso as $rol_permiso) {{ $rol_permiso->permiso == $permiso->nombre ? 'checked' : '' }} @endforeach
                                            value="{{ $permiso->nombre }}">
                                        <label class="form-check-label">{{ $permiso->nombre }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-4 ml-3 mt-4">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        Editar
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
