@extends('layouts.app')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <div class="card card-custom-content mt-2 border-0">
                <div class="card-content">
                    <h2>Roles y permisos</h2>
                </div>
                <div class="table-responsive">
                    <table class="table-custom">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Rol</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; ?>
                            @foreach ($roles as $rol)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $rol->nombre_rol }}</td>
                                    @foreach ($permisos as $permiso)
                                        @if ($permiso->permiso == 'rol-editar')
                                            <td>
                                                <form action="{{ route('rol.destroy', $rol->id) }}" method="post">
                                                    <a class="btn btn-primary btn-sm text-white"
                                                        href="/rol/{{ $rol->id }}/edit" title="Editar"><i class="fas fa-edit"></i></a>
                                        @endif
                                        @if ($permiso->permiso == 'rol-eliminar')
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm" type="submit"><i
                                                    class="fas fa-eraser"></i></button>
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
    </main>
@endsection
