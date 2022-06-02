@extends('layouts.app')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Roles y permisos</h1>
            <hr>
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i> Tabla de roles y permisos
                    @foreach ($permisos as $permiso)
                        @if ($permiso->permiso == 'crear-rol')
                            <a class=" btn btn-primary btn-sm" href="{{ url('rol/create') }}"><i
                                    class="fas fa-plus-circle"></i> Nuevo</a>
                        @endif
                    @endforeach
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="" id="SimpleTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Rol</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $rol)
                                    <tr>
                                        <td>{{ $rol->id }}</td>
                                        <td>{{ $rol->nombre_rol }}</td>
                                        @foreach ($permisos as $permiso)
                                            @if ($permiso->permiso == 'editar-rol')
                                                <td>
                                                    <form action="{{ route('rol.destroy', $rol->id) }}" method="post">
                                                        <a class="btn btn-info btn-sm text-white"
                                                            href="/rol/{{ $rol->id }}/edit"><i
                                                                class="fas fa-edit"></i>
                                                            Editar</a>
                                            @endif
                                            @if ($permiso->permiso == 'eliminar-rol')
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm" type="submit"><i
                                                        class="fas fa-trash"></i> Eliminar</button>
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
@endsection
