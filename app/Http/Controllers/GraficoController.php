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
        return view('charts.index', compact('permisos','usuarios', 'empresasCharts', 'empresasCharts374', 'empresasChartsPuntaje'));
    }
}
