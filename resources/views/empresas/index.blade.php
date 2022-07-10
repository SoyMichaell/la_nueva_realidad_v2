@extends('layouts.app')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Microempresa | Departamento de Casanare</h1>
            <p>Base de datos suministrada por la camara de comercion de Casanare, empresas registradas en el año 2020.</p>
            <hr>
            <div class="card">
                <div class="card-header"><i class="fas fa-table"></i> Tabla de microempresas <a
                    class="btn btn-primary btn-sm" href="{{ url('empresa/create') }}"><i class="fas fa-plus-circle"></i> Nuevo</a></div> 
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="SimpleTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nit o Num Id</th>
                                    <th>Razón social o Nombre</th>
                                    <th>Correo electronico</th>
                                    <th>Telefono</th>
                                    <th>Dirección</th>
                                    <th>Municipio</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($empresas) <= 0)
                                    <td class="text-center" colspan="9">No hay registros</td>
                                @endif
                                @foreach ($empresas as $empresa)
                                    <tr class="bg-white text-dark">
                                        <td>{{ $empresa->id }}</td>
                                        <td>{{ $empresa->nit }}</td>
                                        <td class="text-primary"><a
                                                href="{{ route('empresa.edit', $empresa->id) }}">{{ Str::ucfirst($empresa->razon_social) }}</a>
                                        </td>
                                        <td>{{ $empresa->correo }}</td>
                                        <td>{{ $empresa->telefono1 }}</td>
                                        <td style="width: 10%">{{ $empresa->direccion }}</td>
                                        <td>{{ $empresa->municipio }}</td>
                                        <td>
                                            <p
                                                class="{{ $empresa->estado == 'seleccionado' ? 'badge bg-success text-white' : 'badge bg-light text-dark' }}">
                                                {{ $empresa->estado }}</p>
                                        </td>
                                        <td>
                                            <form action="{{ url("empresa/{$empresa->id}") }}" method="post">
                                                <a class="btn btn-info btn-sm"
                                                    href="{{ route('empresa.edit', $empresa->id) }}"><i
                                                        class="fas fa-edit"></i> Editar</a>
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm" type="submit">
                                                    <i class="fas fa-trash"></i>
                                                    Borrar
                                                </button>
                                            </form>
                                        </td>
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
