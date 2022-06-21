@extends('layouts.app')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Usuarios</h1>
            <hr>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header"><i class="fas fa-table"></i> Tabla de usuarios en plataforma
                            @foreach ($permisos as $permiso)
                                @if ($permiso->permiso == 'crear-usuario')
                                    <a class="btn btn-primary btn-sm" href="{{ url('usuario/create') }}"><i
                                            class="fas fa-plus-circle"></i> Nuevo</a>
                                @endif
                            @endforeach
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="SimpleTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tipo documento</th>
                                            <th>Nro. documento</th>
                                            <th>Nombre (s)</th>
                                            <th>Apellido (s)</th>
                                            <th>Correo (SENA)</th>
                                            <th>Correo secundario</th>
                                            <th>Telefono</th>
                                            <th>Rol</th>
                                            <th>Estado</th>
                                            <th>--</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($usuarios) <= 0)
                                            <tr>
                                                <td colspan="10" class="text-center">No hay resultados</td>
                                            </tr>
                                        @endif
                                        <?php $i = 1; ?>
                                        @foreach ($usuarios as $usuario)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $usuario->tipo_documento }}</td>
                                                <td>{{ $usuario->numero_documento }}</td>
                                                <td>{{ Str::ucfirst($usuario->nombre) }}</td>
                                                <td>{{ Str::ucfirst($usuario->apellido) }}</td>
                                                <td>{{ $usuario->correo_institucional }}</td>
                                                <td>{{ $usuario->correo_personal}}</td>
                                                <td>{{ $usuario->telefono }}</td>
                                                <td>
                                                    <p class="badge bg-info text-white">{{ $usuario->nombre_rol }}</p>
                                                </td>
                                                <td>
                                                    <p
                                                        class="badge {{ $usuario->estado == 'Activo' ? 'bg-success' : 'bg-danger' }} text-white">
                                                        {{ $usuario->estado }}</p>
                                                </td>
                                                @foreach ($permisos as $permiso)
                                                    @if ($permiso->permiso == 'editar-usuario')
                                                        <td>
                                                            <form action="{{ url("usuario/{$usuario->idUser}") }}"
                                                                method="POST">

                                                                <a class="btn btn-info btn-sm text-white"
                                                                    href="{{ route('usuario.edit', Str::lower($usuario->slug)) }}"><i
                                                                        class="fas fa-edit"></i> Editar</a>
                                                    @endif
                                                    @if ($permiso->permiso == 'eliminar-usuario')
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger btn-sm" type="submit">
                                                            <i class="fas fa-trash"></i> Borrar
                                                        </button>
                                                        </form>
                                                        </td>
                                                    @endif
                                                @endforeach
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        $(document).ready(function() {
            $('SimpleTable').DataTable();
        });
    </script>
@endsection
