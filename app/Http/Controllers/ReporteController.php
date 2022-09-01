<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReporteController extends Controller
{
    public function index()
    {
        $permisos = DB::table('roles_permisos')->where('id_rol', Auth::user()->rol)->get();
        return view('reporte.index', compact('permisos'));
    }

    public function pdfEmpresas()
    {
        $personas = DB::table('users')
            ->where('rol', 7)
            ->orWhere('rol', 8)
            ->orderBy('nombre', 'asc')
            ->get();
            $empresasCuenta = DB::table('diagnostico_individual')
            ->select('municipio',DB::raw('COUNT(*) as total'),)
            ->join('empresas', 'diagnostico_individual.nit_empresa', '=', 'empresas.nit')
            ->groupBy('municipio')
            ->orderBy('municipio')
            ->get();
        $valor = 'asignacion';
        $view = \view('reporte.pdf', compact('personas','valor','empresasCuenta'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('asignacion empresas.pdf');
    }

    public function muestra_empresarios()
    {
        $empresas = DB::table('empresas')
            ->where('estado_35', 'seleccionado')
            ->get();
        $valor = 'muestra';
        $view = \view('reporte.pdf', compact('empresas','valor'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('muestra de estudio.pdf');
    }
}
