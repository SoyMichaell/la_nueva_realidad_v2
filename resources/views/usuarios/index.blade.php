@extends('layouts.app')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Módulo usuarios</h1>
            @foreach ($permisos as $permiso)
                @if ($permiso->permiso == 'usuario-crear')
                    <a class="btn btn-primary" style="width: 150px;" href="{{ url('usuario/create') }}"><i
                            class="fas fa-plus"></i>
                        Nuevo</a>
                @endif
            @endforeach
            <hr>
            <div class="card">
                <div class="card-header"><i class="fas fa-table"></i> Tabla de usuarios en plataforma</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
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

                                                        <a class="btn btn-info btn-sm"
                                                            href="{{ route('usuario.edit', Str::lower($usuario->slug)) }}"><i
                                                                class="fas fa-edit"></i> Editar</a>
                                            @endif
                                            @if ($permiso->permiso == 'usuario-eliminar')
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm" type="submit">
                                                    <i class="fas fa-eraser"></i> Borrar
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
