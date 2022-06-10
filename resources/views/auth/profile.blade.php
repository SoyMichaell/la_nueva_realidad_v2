@extends('layouts.app')
@section('content')
    <main>
        <div class="container px-4">
            <h1 class="mt-4"><i class="fas fa-edit"></i> Actualizar información</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Información basica</li>
            </ol>
            <div class="">
                <div class=""><i class="fas fa-database"></i> <strong>Datos basicos</strong></div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="row mb-3">
                            <label for="" class="col-sm-2 col-form-label">Nombre (s)</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="nombre" id="nombre"
                                    value="{{ Auth::user()->nombre }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-sm-2 col-form-label">Apellido (s)</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="apellido" id="apellido"
                                    value="{{ Auth::user()->apellido }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-sm-2 col-form-label">Correo electronico personal</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="email" name="correo_personal" id="correo_personal"
                                    value="{{ Auth::user()->correo_personal }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-sm-2 col-form-label">Telefono</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="number" name="telefono" id="telefono"
                                    value="{{ Auth::user()->telefono }}">
                            </div>
                        </div>
                        <div class="row mb-3 mt-4">
                            <label for="" class="col-sm-2 col-form-label">Nivel de programa</label>
                            <div class="col-md-10">
                                <select class="form-select {{ $errors->has('nivel_programa') ? 'is-invalid' : '' }}"
                                    name="nivel_programa" id="nivel_programa" autofocus>
                                    <option value="">---- SELECCIONE ----</option>
                                    <option value="técnico"
                                        {{ Auth::user()->nivel_programa == 'técnico' ? 'selected' : '' }}>Técnico</option>
                                    <option value="tecnológo"
                                        {{ Auth::user()->nivel_programa == 'tecnológo' ? 'selected' : '' }}>Tecnológo
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-sm-2 col-form-label">Programa de formación</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="programa" id="programa"
                                    value="{{ Auth::user()->programa }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 d-flex justify-content-end">
                                <button class="btn btn-primary btn-sm" type="submit">Actualizar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class=" mt-4">
                <div class="card-header"><i class="fas fa-lock"></i> <strong>Cambiar contraseña</strong> </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="row mb-3">
                            <label for="" class="col-sm-2 col-form-label">Nueva contraseña</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="password" name="password" id="password" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-sm-2 col-form-label">Confirmar Nueva contraseña</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="password" name="new__password" id="new__password" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-primary btn-sm" type="submit">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
