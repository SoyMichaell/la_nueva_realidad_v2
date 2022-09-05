@extends('layouts.app')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="title-card mt-4 d-flex align-items-center">Módulo usuarios</h1>
                    @foreach ($permisos as $permiso)
                        @if ($permiso->permiso == 'usuario-crear')
                            <a class="btn btn-primary btn-sm" href="{{ url('usuario/create') }}"><i
                                    class="fas fa-plus-circle"></i>
                                Nuevo usuario</a>
                        @endif
                    @endforeach
                </div>
            </div>
            <hr>
            <div class="card">
                <div class="card-header subtitle-card"><i class="fas fa-table"></i> Tabla de usuarios en plataforma</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table-custom">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tipo documento</th>
                                    <th>Nro. documento</th>
                                    <th>Nombre (s)</th>
                                    <th>Apellido (s)</th>
                                    <th>Correo (SENA)</th>
                                    <th>Telefono</th>
                                    <th>Rol</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
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
                                        <td>{{ $usuario->telefono }}</td>
                                        <td>
                                            <p class="badge text-black">{{ $usuario->nombre_rol }}</p>
                                        </td>
                                        <td>
                                            <p
                                                class="badge {{ $usuario->estado == 'Activo' ? 'bg-success' : 'bg-danger' }} text-white">
                                                {{ $usuario->estado }}</p>
                                        </td>
                                        @foreach ($permisos as $permiso)
                                            @if ($permiso->permiso == 'usuario-editar')
                                                <td>
                                                    <form action="{{ url("usuario/{$usuario->idUser}") }}" method="POST">

                                                        <a class="btn btn-primary btn-sm"
                                                            href="{{ route('usuario.edit', Str::lower($usuario->slug)) }}"
                                                            title="Editar"><i class="fas fa-edit"></i></a>
                                            @endif
                                            @if ($permiso->permiso == 'usuario-eliminar')
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm" type="submit">
                                                    <i class="fas fa-eraser"></i>
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
    </main>
    <script>
        $(document).ready(function() {
            $('SimpleTable').DataTable();
        });
    </script>
@endsection
