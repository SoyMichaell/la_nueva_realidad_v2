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
            //Consulta avance actividades implementación
            $validacionInstrumento = DB::table('validacion_instrumentos')
                ->select('validacion_instrumentos.nit_empresa',DB::raw('SUM(analisis) as suma1'),DB::raw('SUM(dofa) as suma2'), DB::raw('SUM(imagen) as suma3'), DB::raw('SUM(tablero) as suma4'))
                ->join('empresas', 'empresas.nit','=','validacion_instrumentos.nit_empresa')
                ->orderBy('empresas.nit','desc')
                ->groupBy('nit_empresa')
                ->get();
            $permisos = DB::table('roles_permisos')->where('id_rol', Auth::user()->rol)->get();
            //consulta grafico diagnostico
            $diagnosticos = DB::table('resultados')
                ->join('empresas','resultados.nit_empresa','=','empresas.nit')    
                ->where('estado_35', 'seleccionado')
                ->get();
            //Consulta grafico usuarios
            $usuarios = DB::table('users')
                ->select('nombre_rol', DB::raw('count(*) as total'))
                ->join('roles', 'users.rol', '=', 'roles.id')
                ->groupBy('nombre_rol')
                ->get();
            //Consulta grafico empresas
            $empresasCharts = DB::table('empresas')
                ->select('municipio', DB::raw('count(*) as total'))
                ->where('estado_35', 'seleccionado')
                ->groupBy('municipio')
                ->get();
            $coloresRand = array(
                            "#2DAAB8","#FCAD73","#ED7171","#D98880",
                            "#F1948A","#C39BD3","#7FB3D5","#76D7C4",
                            "#7DCEA0","#82E0AA","#F7DC6F","#F8C471",
                            "#F0B27A","#F4F6F7","#D7DBDD","#B2BABB",
                            "#85929E"
                            );
            return view('home', compact('permisos', 'users', 'empresas', 'usuarios', 'empresasCharts','diagnosticos','validacionInstrumento','coloresRand'));
        } else {
            $permisos = DB::table('roles_permisos')->where('id_rol', Auth::user()->rol)->get();
            return view('/', compact('permisos'));
        }
    }
}
