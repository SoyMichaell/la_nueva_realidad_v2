<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GraficoController extends Controller
{
    public function index()
    {
        $usuarios = DB::table('users')
            ->select('nombre_rol', DB::raw('count(*) as total'))
            ->join('roles', 'users.rol', '=', 'roles.id')
            ->groupBy('nombre_rol')
            ->get();
        //Consulta grafico empresas
        $empresasCharts = DB::table('empresas')
            ->select('municipio', DB::raw('count(*) as total'))
            ->groupBy('municipio')
            ->get();
        //Consulta grafico empresas 374 empresas
        $empresasCharts374 = DB::table('empresas')
            ->join('resultados', 'empresas.nit', '=', 'resultados.nit_empresa')
            ->select('municipio', DB::raw('count(*) as total'))
            ->groupBy('municipio')
            ->get();
        //Consulta grafico puntaje 374 empresas
        $empresasChartsPuntaje = DB::table('resultados')
            ->select('municipio', DB::raw('SUM(total)/COUNT(*) as promedio'))
            ->join('empresas', 'resultados.nit_empresa', '=', 'empresas.nit')
            ->where('empresas.estado_35', "seleccionado")
            ->groupBy('municipio')
            ->get();
        $permisos = DB::table('roles_permisos')->where('id_rol', Auth::user()->rol)->get();
        return view('charts.index', compact('permisos', 'usuarios', 'empresasCharts', 'empresasCharts374', 'empresasChartsPuntaje'));
    }

    public function graficoEncuesta()
    {
        //grafico 1
        $grafico1 = DB::table('respuestas')
            ->select('pre1_pcd', DB::raw('count(*) as total'))
            ->groupBy('pre1_pcd')
            ->get();
        //grafico 2
        $grafico2 = DB::table('respuestas')
            ->select('pre2_pcd', DB::raw('count(*) as total'))
            ->groupBy('pre2_pcd')
            ->get();

        //grafico3
        $grafico3_1 = DB::table('respuestas')
            ->select('pre3_1_pcd', DB::raw('count(*) as ajustejornada'))
            ->groupBy('pre3_1_pcd')
            ->get();
        $grafico3_2 = DB::table('respuestas')
            ->select('pre3_2_pcd', DB::raw('count(*) as ajustereduccion'))
            ->groupBy('pre3_2_pcd')
            ->get();
        $grafico3_3 = DB::table('respuestas')
            ->select('pre3_3_pcd', DB::raw('count(*) as implementacion'))
            ->groupBy('pre3_3_pcd')
            ->get();
        $grafico3_4 = DB::table('respuestas')
            ->select('pre3_4_pcd', DB::raw('count(*) as introduccion'))
            ->groupBy('pre3_4_pcd')
            ->get();
        $grafico3_5 = DB::table('respuestas')
            ->select('pre3_5_pcd', DB::raw('count(*) as cambio'))
            ->groupBy('pre3_5_pcd')
            ->get();
        $grafico3_6 = DB::table('respuestas')
            ->select('pre3_6_pcd', DB::raw('count(*) as ajustes'))
            ->groupBy('pre3_6_pcd')
            ->get();

        //grafico4
        $grafico4_1 = DB::table('respuestas')
            ->select('pre4_1_pcd', DB::raw('count(*) as circular'))
            ->groupBy('pre4_1_pcd')
            ->get();
        $grafico4_2 = DB::table('respuestas')
            ->select('pre4_2_pcd', DB::raw('count(*) as ajuste'))
            ->groupBy('pre4_2_pcd')
            ->get();
        $grafico4_3 = DB::table('respuestas')
            ->select('pre4_3_pcd', DB::raw('count(*) as implementacion'))
            ->groupBy('pre4_3_pcd')
            ->get();
        $grafico4_4 = DB::table('respuestas')
            ->select('pre4_4_pcd', DB::raw('count(*) as introduccion'))
            ->groupBy('pre4_4_pcd')
            ->get();
        $grafico4_5 = DB::table('respuestas')
            ->select('pre4_5_pcd', DB::raw('count(*) as presentacion'))
            ->groupBy('pre4_5_pcd')
            ->get();
        $grafico4_6 = DB::table('respuestas')
            ->select('pre4_6_pcd', DB::raw('count(*) as distribucion'))
            ->groupBy('pre4_6_pcd')
            ->get();

        //grafico5
        $grafico5 = DB::table('respuestas')
            ->select('pre5_pcd', DB::raw('count(*) as total'))
            ->groupBy('pre5_pcd')
            ->get();
        $grafico5_1 = DB::table('respuestas')
            ->select('pre5_pcd', DB::raw('count(*) as total'))
            ->groupBy('pre5_pcd')
            ->get();

        $permisos = DB::table('roles_permisos')->where('id_rol', Auth::user()->rol)->get();
        return view(
            'charts.encuesta',
            compact(
                'grafico1',
                'grafico2',
                'grafico3_1',
                'grafico3_2',
                'grafico3_3',
                'grafico3_4',
                'grafico3_5',
                'grafico3_6',
                'grafico4_1',
                'grafico4_2',
                'grafico4_3',
                'grafico4_4',
                'grafico4_5',
                'grafico4_6',
                'grafico5',
                'permisos'
            )
        );
    }
}
