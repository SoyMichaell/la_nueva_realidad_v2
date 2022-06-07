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
            //Consulta grafico emresas 374 empresas
            $empresasCharts374 = DB::table('empresas')
                ->join('resultados','empresas.nit','=','resultados.nit_empresa')
                ->select('municipio', DB::raw('count(*) as total'))
                ->groupBy('municipio')
                ->get();
            return view('home', compact('permisos', 'users', 'empresas', 'usuarios', 'empresasCharts', 'empresasCharts374'));
        } else {
            $permisos = DB::table('roles_permisos')->where('id_rol', Auth::user()->rol)->get();
            return view('/', compact('permisos'));
        }
    }
}
