@extends('layouts.app')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <div class="">
                <h1 class="title-card mt-4">Base de datos microempresas año 2020.</h1>
                <p>Base de datos suministrada por la camara de comercio de Casanare, estas empresas son la población total
                    del estudio. Empresas registradas en camara de comercio durante el tiempo (marzo 2022 - marzo 2021)</p>
                <a class="btn btn-primary btn-sm" href="{{ url('empresa/create') }}"><i class="fas fa-plus-circle"></i>
                    Nueva empresa</a>
            </div>
            <div class="card mt-2">
                <div class="card-header subtitle-card"><i class="fas fa-table"></i> Tabla de microempresas departamento de
                    casanare 2020</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table-custom">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nit</th>
                                    <th style="width: 25%">Razón social o Nombre</th>
                                    <th style="width: 20%">Correo electronico</th>
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
                                        <td><a
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
                                                <a class="btn btn-primary btn-sm"
                                                href="empresa/{{$empresa->id}}/edit" title="Editar"><i
                                                    class="fas fa-edit"></i></a>
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm" type="submit">
                                                    <i class="fas fa-eraser"></i>
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
        </div>
    </main>
@endsection
