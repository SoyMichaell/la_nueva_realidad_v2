<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::check()) {
            $users = DB::table('users')->get();
            $empresas = DB::table('empresas')->get();
            $permisos = DB::table('roles_permisos')->where('id_rol', Auth::user()->rol)->get();
            //Consulta grafico usuarios
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
            $cuentaInstructor = DB::table('users')->where('rol', 7)->get();
            $cuentaAprendiz = DB::table('users')->where('rol', 9)->get();
            return view('home', compact('permisos', 'users', 'empresas', 'usuarios', 'empresasCharts', 'empresasCharts374', 'empresasChartsPuntaje','cuentaInstructor','cuentaAprendiz'));
        } else {
            $permisos = DB::table('roles_permisos')->where('id_rol', Auth::user()->rol)->get();
            return view('/', compact('permisos'));
        }
    }
}
