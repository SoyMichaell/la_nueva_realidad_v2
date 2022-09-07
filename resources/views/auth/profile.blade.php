@extends('layouts.app')
@section('content')
    <main>
        <div class="container bg-white p-3 mt-4">
            <h1 class="title-card mt-2">Perfil usuario</h1>
            <p>Actualiza datos personales</p>
            <div class="contenido-acciones">
                Acciones:
                <a class="btn btn-primary" title="Actualizar información basica" data-bs-toggle="modal" data-bs-target="#datosBasicos"><i class="fas fa-info-circle"></i></a>
                <a class="btn btn-primary" title="Actualizar contraseña" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-key"></i></a>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table-custom">
                        <tbody>
                            <tr>
                                <th>Tipo documento</th>
                                <td>{{ Auth::user()->tipo_documento }}</td>
                            </tr>
                            <tr>
                                <th>Número de documento</th>
                                <td>{{ Auth::user()->numero_documento }}</td>
                            </tr>
                            <tr>
                                <th>Nombre (s)</th>
                                <td>{{ Auth::user()->nombre }}</td>
                            </tr>
                            <tr>
                                <th>Apellido (s)</th>
                                <td>{{ Auth::user()->apellido }}</td>
                            </tr>
                            <tr>
                                <th>Correo electronico personal</th>
                                <td>{{ Auth::user()->correo_personal }}</td>
                            </tr>
                            <tr>
                                <th>Telefono</th>
                                <td>{{ Auth::user()->telefono }}</td>
                            </tr>
                            <tr>
                                <th>Nivel programa</th>
                                <td>{{ Str::ucfirst(Auth::user()->nivel_programa) }}</td>
                            </tr>
                            <tr>
                                <th>Programa</th>
                                <td>{{ Auth::user()->programa }}</td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </main>
    <!-- Modal datos basicos -->
    <div class="modal fade" id="datosBasicos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="title-card" id="exampleModalLabel"><i class="fas fa-cube"></i> <strong>Datos
                            basicos</strong> </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('usuario/' . Auth::user()->slug . '/actualizar') }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label for="tipo_documento">Tipo de documento</label>
                            <div class="col-sm-12">
                                <select class="form-select {{ $errors->has('tipo_documento') ? 'is-invalid' : '' }}"
                                    name="tipo_documento" id="tipo_documento" autofocus>
                                    <option value="">---- Seleccione ----</option>
                                    <option value="T.I" {{ Auth::user()->tipo_documento == 'T.I' ? 'selected' : '' }}>
                                        Tarjeta de identidad</option>
                                    <option value="C.C" {{ Auth::user()->tipo_documento == 'C.C' ? 'selected' : '' }}>
                                        Cedula de ciudadanía
                                    </option>
                                    <option value="C.E" {{ Auth::user()->tipo_documento == 'C.E' ? 'selected' : '' }}>
                                        Cedula de extranjeria
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="numero_documento">Número de documento</label>
                            <div class="col-sm-12">
                                <input class="form-control" type="number" name="numero_documento" id="numero_documento"
                                    value="{{ Auth::user()->numero_documento }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="nombre">Nombre (s)</label>
                            <div class="col-sm-12">
                                <input class="form-control" type="text" name="nombre" id="nombre"
                                    value="{{ Auth::user()->nombre }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="apellido">Apellido (s)</label>
                            <div class="col-sm-12">
                                <input class="form-control" type="text" name="apellido" id="apellido"
                                    value="{{ Auth::user()->apellido }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="correo_personal">Correo electronico personal</label>
                            <div class="col-sm-12">
                                <input class="form-control" type="email" name="correo_personal" id="correo_personal"
                                    value="{{ Auth::user()->correo_personal }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="telefono">Telefono</label>
                            <div class="col-sm-12">
                                <input class="form-control" type="number" name="telefono" id="telefono"
                                    value="{{ Auth::user()->telefono }}">
                            </div>
                        </div>
                        <div class="row mb-3 mt-4">
                            <label for="nivel_programa">Nivel de programa</label>
                            <div class="col-md-12">
                                <select class="form-select {{ $errors->has('nivel_programa') ? 'is-invalid' : '' }}"
                                    name="nivel_programa" id="nivel_programa" autofocus>
                                    <option value="">---- Seleccione ----</option>
                                    <option value="técnico"
                                        {{ Auth::user()->nivel_programa == 'técnico' ? 'selected' : '' }}>Técnico
                                    </option>
                                    <option value="tecnológo"
                                        {{ Auth::user()->nivel_programa == 'tecnológo' ? 'selected' : '' }}>Tecnológo
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="programa">Programa de formación</label>
                            <div class="col-sm-12">
                                <input class="form-control" type="text" name="programa" id="programa"
                                    value="{{ Auth::user()->programa }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 d-flex justify-content-start">
                                <button class="btn btn-primary btn-sm" type="submit">Actualizar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal contraseña -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="title-card" id="exampleModalLabel"><i class="fas fa-lock"></i> <strong>Cambiar
                            contraseña</strong> </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('usuario/' . Auth::user()->slug . '/cambiarContrasena') }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label for="" class="col-sm-12 col-form-label">Nueva contraseña</label>
                            <div class="col-sm-12">
                                <input class="form-control" type="password" name="password" id="password" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-sm-12 col-form-label">Confirmar Nueva contraseña</label>
                            <div class="col-sm-12">
                                <input class="form-control" type="password" name="new__password" id="new__password"
                                    required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-primary" type="submit">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
