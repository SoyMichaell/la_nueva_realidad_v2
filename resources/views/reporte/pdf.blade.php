@extends('reporte.app')
@section('content')
    @if ($valor == 'asignacion')
        <p class="contenido">Proporcionalidad de microempresas por municipio.</p>
        <table>
            <tr>
                <th>Municipio</th>
                <th>Cantidad</th>
            </tr>
            @foreach ($empresasCuenta as $cuenta)
                <tr>
                    <td>{{ $cuenta->municipio }}</td>
                    <td>{{ $cuenta->total }}</td>
                </tr>
            @endforeach
        </table>
        <br>
        <p class="contenido">Distribución y asignación de microempresas a instructores investigadores vinculados al proyecto
            SGPS-10146-2022
            La Nueva Realidad Fase II: Implementación de soluciones estratégicas y medición de impacto para un grupo de
            microempresarios de Casanare.</p>
        <table>
            @foreach ($personas as $persona)
                <?php
                $empresas = DB::table('diagnostico_individual')
                    ->join('empresas', 'diagnostico_individual.nit_empresa', '=', 'empresas.nit')
                    ->where('diagnostico_individual.id_persona', $persona->id)
                    ->get();
                ?>
                <tr>
                    <th class="title" colspan="4">{{ $persona->nombre . ' ' . $persona->apellido }}</th>
                </tr>
                <tr>
                    <th>Nit</th>
                    <th>Razón social</th>
                    <th>Municipio</th>
                    <th>Actividad económica principal</th>
                </tr>
                @foreach ($empresas as $emp)
                    <tr>
                        <td>{{ $emp->nit }}</td>
                        <td>{{ $emp->razon_social }}</td>
                        <td>{{ $emp->municipio }}</td>
                        <td>{{ $emp->ciiu_1 }}</td>
                    </tr>
                @endforeach
            @endforeach
        </table>
    @elseif($valor == 'muestra')
    <p class="contenido">Listado microempresas estudio fase II</p>
    <table>
        <tr>
            <th>Nit</th>
            <th>Razón social</th>
            <th>Dirección</th>
            <th>Municipio</th>
            <th>Telefono</th>
            <th>Correo</th>
        </tr>
    </table>
    @endif
@endsection
