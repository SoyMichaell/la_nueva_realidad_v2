<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\ResultadoEncuesta;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Ui\Presets\React;
use RealRashid\SweetAlert\Facades\Alert;

class DiagnosticoController extends Controller
{

    /*Rutas fase I*/
    public function index(Request $request)
    {
        $empresas = DB::table('resultados')
            ->select('resultados.id', 'nit', 'razon_social', 'ciiu_1', 'municipio', 'fecha_registro_resultado', 'total')
            ->join('empresas', 'resultados.nit_empresa', '=', 'empresas.nit')
            ->get();
        return view('diagnostico/faseI.index', compact('empresas'));
    }

    //Vista diagnostico fase I
    public function show($id)
    {
        $empresa = DB::table('empresas')
            ->join('respuestas', 'empresas.nit', '=', 'respuestas.nit_empresa')
            ->join('resultados', 'empresas.nit', '=', 'resultados.nit_empresa')
            ->where('empresas.nit', $id)
            ->first();
        return view('diagnostico/faseI.empresa', compact('empresa'));
    }
    /*Fin rutas fase I*/

    /*Rutas fase II*/

    //Vista analisis individual fase II
    public function analisis($id)
    {
        $empresa = DB::table('empresas')
            ->join('respuestas', 'empresas.nit', '=', 'respuestas.nit_empresa')
            ->where('nit', $id)
            ->first();
        $usuarios = User::all();
        $exist_diagnostico_empresa = DB::table('diagnostico_individual')->where('nit_empresa', $id)->first();
        $permisos = DB::table('roles_permisos')->where('id_rol', Auth::user()->rol)->get();
        return view('diagnostico/faseII.analisis', compact('empresa', 'usuarios', 'exist_diagnostico_empresa', 'permisos'));
    }

    public function analisis_individual(Request $request)
    {
        $busqueda = trim($request->get('buscar'));
        $empresas = DB::table('resultados')
            ->join('empresas', 'resultados.nit_empresa', '=', 'empresas.nit')
            ->leftJoin('diagnostico_individual', 'resultados.nit_empresa', '=', 'diagnostico_individual.nit_empresa')
            ->leftJoin('users', 'diagnostico_individual.id_persona', '=', 'users.id')
            ->where('estado_35', '=', 'seleccionado')
            ->get();
        $permisos = DB::table('roles_permisos')->where('id_rol', Auth::user()->rol)->get();
        return view('diagnostico/faseII.index', compact('empresas', 'busqueda', 'permisos'));
    }

    public function store(Request $request)
    {

        $DiagnosticoIndividual = DB::table('diagnostico_individual')->where('nit_empresa', $request->get('nit_empresa'))->get();

        if (count($DiagnosticoIndividual) >= 1) {
            $updateDiagnostico = DB::table('diagnostico_individual')->where('nit_empresa', $request->get('nit_empresa'))
                ->update([
                    'id_persona' => $request->get('id_persona')
                ]);
        } else {
            $insertDiagnostico = DB::table('diagnostico_individual')->insert([
                'nit_empresa' => $request->get('nit_empresa'),
                'id_persona' => $request->get('id_persona')
            ]);
        }
        if ($insertDiagnostico == 1 || $updateDiagnostico == 1) {
            Alert::success('Exitoso', 'Asignación registrada');
            return back();
        } else {
            Alert::success('Advertencia', 'No se pudo');
            return back();
        }
    }

    public function mision(Request $request, $id)
    {
        $mision = DB::table('diagnostico_individual')->where('nit_empresa', $id)->update(['mision' => $request->get('mision')]);

        if ($mision == 1) {
            Alert::success('Exitoso', 'La información se ha guardado');
            return back();
        } else {
            Alert::warning('Advertencia', 'No se pudo');
            return back();
        }
    }

    public function vision(Request $request, $id)
    {
        $vision = DB::table('diagnostico_individual')->where('nit_empresa', $id)->update(['vision' => $request->get('vision')]);

        if ($vision == 1) {
            Alert::success('Exitoso', 'La información se ha guardado');
            return back();
        } else {
            Alert::warning('Advertencia', 'No se pudo');
            return back();
        }
    }

    public function objestrategico(Request $request, $id)
    {
        $objestrategico = DB::table('diagnostico_individual')->where('nit_empresa', $id)->update(['objetivo_estrategio' => $request->get('objestrategico')]);

        if ($objestrategico == 1) {
            Alert::success('Exitoso', 'La información se ha guardado');
            return back();
        } else {
            Alert::warning('Advertencia', 'No se pudo');
            return back();
        }
    }

    public function perspectivacrecimientodesarrollo(Request $request, $id)
    {
        $perspectivacrecimientod = DB::table('diagnostico_individual')->where('nit_empresa', $id)
            ->update([
                'preguntacd1' => $request->get('preguntacd1'),
                'preguntacd1_1' => $request->get('preguntacd1_1'),
                'preguntacd2' => $request->get('preguntacd2'),
                'preguntacd3' => $request->get('preguntacd3'),
                'preguntacd4' => $request->get('preguntacd4'),
                'preguntacd5' => $request->get('preguntacd5'),
                'preguntacd5_1' => $request->get('preguntacd5_1'),
                'preguntacd6' => $request->get('preguntacd6'),
                'preguntacd7' => $request->get('preguntacd7'),
                'preguntacd8' => $request->get('preguntacd8'),
                'preguntacd9' => $request->get('preguntacd9'),
                'preguntacd10' => $request->get('preguntacd10'),
                'preguntacd11' => $request->get('preguntacd11'),
                'preguntacd12' => $request->get('preguntacd12'),
                'preguntacd13' => $request->get('preguntacd13'),
                'preguntacd14' => $request->get('preguntacd14'),
                'preguntacd15' => $request->get('preguntacd15'),
                'preguntacd16' => $request->get('preguntacd16'),
                'preguntacd17' => $request->get('preguntacd17'),
                'preguntacd17_1' => $request->get('preguntacd17_1'),
            ]);

        if ($perspectivacrecimientod == 1) {
            Alert::success('Exitoso', 'La información se ha guardado');
            return back();
        } else {
            Alert::warning('Advertencia', 'No se pudo');
            return back();
        }
    }

    public function perspectivacliente(Request $request, $id)
    {
        $perspectivacliente = DB::table('diagnostico_individual')->where('nit_empresa', $id)
            ->update([
                'preguntac1' => $request->get('preguntac1'),
                'preguntac2' => $request->get('preguntac2'),
                'preguntac3' => $request->get('preguntac3'),
                'preguntac4' => $request->get('preguntac4'),
                'preguntac4_1' => $request->get('preguntac4_1'),
                'preguntac5' => $request->get('preguntac5'),
                'preguntac6' => $request->get('preguntac6'),
                'preguntac7' => $request->get('preguntac7'),
                'preguntac8' => $request->get('preguntac8'),
                'preguntac9' => $request->get('preguntac9'),
            ]);

        if ($perspectivacliente == 1) {
            Alert::success('Exitoso', 'La información se ha guardado');
            return back();
        } else {
            Alert::warning('Advertencia', 'No se pudo');
            return back();
        }
    }

    public function perspectivaprocesosinternos(Request $request, $id)
    {
        $perspectivaprocesosinternos = DB::table('diagnostico_individual')->where('nit_empresa', $id)
            ->update([
                'preguntapi1' => $request->get('preguntapi1'),
                'preguntapi2' => $request->get('preguntapi2'),
                'preguntapi3' => $request->get('preguntapi3'),
                'preguntapi3_1' => $request->get('preguntapi3_1'),
                'preguntapi4' => $request->get('preguntapi4'),
                'preguntapi4_1' => $request->get('preguntapi4_1'),
                'preguntapi5' => $request->get('preguntapi5'),
                'preguntapi6' => $request->get('preguntapi6'),
                'preguntapi6_1' => $request->get('preguntapi6_1'),
                'preguntapi7' => $request->get('preguntapi7'),
                'preguntapi8' => $request->get('preguntapi8'),
            ]);

        if ($perspectivaprocesosinternos == 1) {
            Alert::success('Exitoso', 'La información se ha guardado');
            return back();
        } else {
            Alert::warning('Advertencia', 'No se pudo');
            return back();
        }
    }

    public function perspectivafinanciera(Request $request, $id)
    {
        $perspectivafinanciera = DB::table('diagnostico_individual')->where('nit_empresa', $id)
            ->update([
                'preguntapf1' => $request->get('preguntapf1'),
                'preguntapf1_1' => $request->get('preguntapf1_1'),
                'preguntapf2' => $request->get('preguntapf2'),
                'preguntapf2_1' => $request->get('preguntapf2_1'),
                'preguntapf3' => $request->get('preguntapf3'),
                'preguntapf3_1' => $request->get('preguntapf3_1'),
                'preguntapf4' => $request->get('preguntapf4'),
                'preguntapf5' => $request->get('preguntapf5'),
                'preguntapf6' => $request->get('preguntapf6'),
                'preguntapf7' => $request->get('preguntapf7'),
                'preguntapf8' => $request->get('preguntapf8'),
                'preguntapf9' => $request->get('preguntapf9'),
                'preguntapf9_1' => $request->get('preguntapf9_1'),
                'preguntapf10' => $request->get('preguntapf10'),
                'preguntapf10_1' => $request->get('preguntapf10_1'),
                'preguntapf11' => $request->get('preguntapf11'),
                'preguntapf12' => $request->get('preguntapf12'),
                'preguntapf13' => $request->get('preguntapf13'),
                'preguntapf14' => $request->get('preguntapf14'),
                'preguntapf15' => $request->get('preguntapf15'),
            ]);

        if ($perspectivafinanciera == 1) {
            Alert::success('Exitoso', 'La información se ha guardado');
            return back();
        } else {
            Alert::warning('Advertencia', 'No se pudo');
            return back();
        }
    }

    public function destroy($id)
    {
        $DiagnosticoIndividual = DB::table('diagnostico_individual')->where('nit_empresa', $id)->delete();
        if ($DiagnosticoIndividual == 1) {
            Alert::success('Exitoso', 'El diagnostico se ha eliminado');
            return back();
        } else {
            Alert::success('Advertencia', 'No se pudo');
            return back();
        }
    }

    public function asignacion(){
        $personas = DB::table('users')
            ->where('rol',7)
            ->orderBy('nombre','asc')
            ->get();
        return view('diagnostico/faseII.asignacion', compact('personas'));
    }

    /*Fin rutas fase II*/

    /*Rutas DOFA*/
    public function mdofa()
    {
        $empresas = DB::table('diagnostico_individual')
            ->join('empresas', 'diagnostico_individual.nit_empresa', '=', 'empresas.nit')
            ->get();
        return view('diagnostico/dofa.index', compact('empresas'));
    }

    public function mcrear($id)
    {
        $empresa = Empresa::find($id);
        return view('diagnostico/dofa.crear', compact('empresa'));
    }
}
