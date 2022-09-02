<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use App\Models\Empresa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class DiagnosticoController extends Controller
{
    /*Rutas fase I*/
    public function index(Request $request)
    {
        $idPersona = Auth::user()->rol;
        if ($idPersona == 7) {
            $empresas = DB::table('resultados')
                ->select('resultados.id', 'nit', 'razon_social', 'ciiu_1', 'municipio', 'fecha_registro_resultado', 'total')
                ->join('empresas', 'resultados.nit_empresa', '=', 'empresas.nit')
                ->join('diagnostico_individual', 'empresas.nit', '=', 'diagnostico_individual.nit_empresa')
                ->where('diagnostico_individual.id_persona', Auth::user()->id)
                ->get();
        } elseif ($idPersona == 1) {
            $empresas = DB::table('resultados')
                ->select('resultados.id', 'nit', 'razon_social', 'ciiu_1', 'municipio', 'fecha_registro_resultado', 'total')
                ->join('empresas', 'resultados.nit_empresa', '=', 'empresas.nit')
                ->get();
        }
        $permisos = DB::table('roles_permisos')
            ->where('id_rol', Auth::user()->rol)
            ->get();
        return view('diagnostico/faseI.index', compact('empresas', 'permisos'));
    }

    //Vista diagnostico fase I
    public function show($id)
    {
        $empresa = DB::table('empresas')
            ->join('respuestas', 'empresas.nit', '=', 'respuestas.nit_empresa')
            ->join('resultados', 'empresas.nit', '=', 'resultados.nit_empresa')
            ->where('empresas.nit', $id)
            ->first();
        $permisos = DB::table('roles_permisos')
            ->where('id_rol', Auth::user()->rol)
            ->get();
        return view('diagnostico/faseI.empresa', compact('empresa', 'permisos'));
    }

    public function pdfDiagnostico($id)
    {
        $empresa = DB::table('empresas')
            ->join('respuestas', 'empresas.nit', '=', 'respuestas.nit_empresa')
            ->join('resultados', 'empresas.nit', '=', 'resultados.nit_empresa')
            ->where('empresas.nit', $id)
            ->first();
        $view = \view('diagnostico/faseI.pdf', compact('empresa'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('diagnostico.pdf');
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
        $exist_diagnostico_empresa = DB::table('diagnostico_individual')
            ->where('nit_empresa', $id)
            ->first();
        $permisos = DB::table('roles_permisos')
            ->where('id_rol', Auth::user()->rol)
            ->get();
        return view('diagnostico/faseII.analisis', compact('empresa', 'usuarios', 'exist_diagnostico_empresa', 'permisos'));
    }

    public function analisis_individual(Request $request)
    {
        $idPersona = Auth::user()->rol;
        if ($idPersona == 1 || $idPersona == 7 || $idPersona == 8) {
            $texto = trim($request->get('buscar'));
            $empresas = DB::table('resultados')
                ->join('empresas', 'resultados.nit_empresa', '=', 'empresas.nit')
                ->join('diagnostico_individual', 'resultados.nit_empresa', '=', 'diagnostico_individual.nit_empresa')
                ->join('users', 'diagnostico_individual.id_persona', '=', 'users.id')
                ->where('estado_35', '=', 'seleccionado')
                ->where('razon_social','LIKE','%'.$texto.'%')
                ->orWhere('municipio','LIKE','%'.$texto.'%')
                ->orWhere('users.nombre','LIKE','%'.$texto.'%')
                ->orWhere('users.apellido','LIKE','%'.$texto.'%')
                ->get();
        } 
        $permisos = DB::table('roles_permisos')
            ->where('id_rol', Auth::user()->rol)
            ->get();
        return view('diagnostico/faseII.index', compact('empresas', 'permisos','texto'));
    }

    public function store(Request $request)
    {
        $DiagnosticoIndividual = DB::table('diagnostico_individual')
            ->where('nit_empresa', $request->get('nit_empresa'))
            ->get();

        if (count($DiagnosticoIndividual) >= 1) {
            $updateDiagnostico = DB::table('diagnostico_individual')
                ->where('nit_empresa', $request->get('nit_empresa'))
                ->update([
                    'id_persona' => $request->get('id_persona'),
                ]);
        } else {
            $insertDiagnostico = DB::table('diagnostico_individual')->insert([
                'nit_empresa' => $request->get('nit_empresa'),
                'id_persona' => $request->get('id_persona'),
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

    public function guardarAnalisis(Request $request, $id)
    {
        $analisis = DB::table('diagnostico_individual')
            ->where('nit_empresa', $id)
            ->update([
                'mision' => $request->get('mision'),
                'vision' => $request->get('vision'),
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

        if ($analisis == 1) {
            Alert::success('Exitoso', 'El diagnostico se ha guardado');
            return back();
        } else {
            Alert::success('Advertencia', 'No se pudo');
            return back();
        }
    }

    public function validarAnalisis($nit){
        
        $valorCampo = DB::table('validacion_instrumentos')
            ->where('nit_empresa', $nit)
            ->first();

        if($valorCampo == ""){
            DB::table('validacion_instrumentos')
            ->insert([
                'nit_empresa' => $nit,
                'analisis' => 1
            ]);
        }else{
            if($valorCampo->analisis == 0){
                DB::table('validacion_instrumentos')
                ->where('nit_empresa', $nit)
                ->update([
                    'analisis' => 1
                ]);
            }else{
                DB::table('validacion_instrumentos')
                ->where('nit_empresa', $nit)
                ->update([
                    'analisis' => 0
                ]);
            }
        }

        Alert::success('Exitoso', 'Validación realizada');
        return back();
    }

    public function validarDofa($nit){
        
        $valorCampo = DB::table('validacion_instrumentos')
            ->where('nit_empresa', $nit)
            ->first();

        if($valorCampo == ""){
            DB::table('validacion_instrumentos')
            ->insert([
                'nit_empresa' => $nit,
                'dofa' => 1
            ]);
        }else{
            if($valorCampo->dofa == 0){
                DB::table('validacion_instrumentos')
                ->where('nit_empresa', $nit)
                ->update([
                    'dofa' => 1
                ]);
            }else{
                DB::table('validacion_instrumentos')
                ->where('nit_empresa', $nit)
                ->update([
                    'dofa' => 0
                ]);
            }
        }

        Alert::success('Exitoso', 'Validación realizada');
        return back();
    }

    public function validarTablero($nit){
        
        $valorCampo = DB::table('validacion_instrumentos')
            ->where('nit_empresa', $nit)
            ->first();

        if($valorCampo == ""){
            DB::table('validacion_instrumentos')
            ->insert([
                'nit_empresa' => $nit,
                'tablero' => 1
            ]);
        }else{
            if($valorCampo->tablero == 0){
                DB::table('validacion_instrumentos')
                ->where('nit_empresa', $nit)
                ->update([
                    'tablero' => 1
                ]);
            }else{
                DB::table('validacion_instrumentos')
                ->where('nit_empresa', $nit)
                ->update([
                    'tablero' => 0
                ]);
            }
        }

        Alert::success('Exitoso', 'Validación realizada');
        return back();
    }

    public function destroy($id)
    {
        $DiagnosticoIndividual = DB::table('diagnostico_individual')
            ->where('nit_empresa', $id)
            ->delete();
        if ($DiagnosticoIndividual == 1) {
            Alert::success('Exitoso', 'El diagnostico se ha eliminado');
            return back();
        } else {
            Alert::success('Advertencia', 'No se pudo');
            return back();
        }
    }

    public function asignacion()
    {
        $personas = DB::table('users')
            ->where('rol', 7)
            ->orWhere('rol', 8)
            ->orderBy('nombre', 'asc')
            ->get();
        $permisos = DB::table('roles_permisos')
            ->where('id_rol', Auth::user()->rol)
            ->get();
        return view('diagnostico/faseII.asignacion', compact('personas', 'permisos'));
    }

    public function pdfAnalisis($id)
    {
        $empresa = DB::table('empresas')
            ->join('respuestas', 'empresas.nit', '=', 'respuestas.nit_empresa')
            ->where('nit', $id)
            ->first();
        $exist_diagnostico_empresa = DB::table('diagnostico_individual')
            ->where('nit_empresa', $id)
            ->first();
        $usuarios = User::all();
        $view = \view('diagnostico/faseII.pdf', compact('empresa', 'exist_diagnostico_empresa', 'usuarios'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('diagnostico.pdf');
    }

    /*Fin rutas fase II*/

    /*Rutas DOFA*/
    public function mdofa()
    {
        if (Auth::user()->rol == 7 || Auth::user()->rol == 8) {
            $empresas = DB::table('diagnostico_individual')
                ->join('empresas', 'diagnostico_individual.nit_empresa', '=', 'empresas.nit')
                ->join('users', 'diagnostico_individual.id_persona', '=', 'users.id')
                ->where('diagnostico_individual.id_persona', Auth::user()->id)
                ->orderBy('municipio')
                ->get();
        } else {
            $empresas = DB::table('diagnostico_individual')
                ->join('empresas', 'diagnostico_individual.nit_empresa', '=', 'empresas.nit')
                ->join('users', 'diagnostico_individual.id_persona', '=', 'users.id')
                ->orderBy('municipio')
                ->get();
        }
        $permisos = DB::table('roles_permisos')
            ->where('id_rol', Auth::user()->rol)
            ->get();
        return view('diagnostico/dofa.index', compact('empresas', 'permisos'));
    }

    public function mcrear($id)
    {
        $empresa = DB::table('empresas')
            ->where('nit', $id)
            ->first();
        $dofa = DB::table('matriz_dofa')
            ->where('nit', $id)
            ->first();
        $permisos = DB::table('roles_permisos')
            ->where('id_rol', Auth::user()->rol)
            ->get();
        return view('diagnostico/dofa.crear', compact('empresa', 'permisos', 'dofa'));
    }

    public function storedofa(Request $request, $id)
    {
        $consultaMatriz = DB::table('matriz_dofa')
            ->where('nit', $id)
            ->get();

        if (count($consultaMatriz) > 0) {
            $matriz_dofa = DB::table('matriz_dofa')
                ->where('nit', $id)
                ->update([
                    //fortalezas
                    'fortaleza1' => $request->get('fortaleza1'),
                    'fortaleza2' => $request->get('fortaleza2'),
                    'fortaleza3' => $request->get('fortaleza3'),
                    'fortaleza4' => $request->get('fortaleza4'),
                    'fortaleza5' => $request->get('fortaleza5'),
                    //debilidades
                    'debilidad1' => $request->get('debilidad1'),
                    'debilidad2' => $request->get('debilidad2'),
                    'debilidad3' => $request->get('debilidad3'),
                    'debilidad4' => $request->get('debilidad4'),
                    'debilidad5' => $request->get('debilidad5'),
                    //oportunidades
                    'oportunidad1' => $request->get('oportunidad1'),
                    'oportunidad2' => $request->get('oportunidad2'),
                    'oportunidad3' => $request->get('oportunidad3'),
                    'oportunidad4' => $request->get('oportunidad4'),
                    'oportunidad5' => $request->get('oportunidad5'),
                    //estrategiasfo
                    'estrategiafo1' => $request->get('estrategiafo1'),
                    'estrategiafo2' => $request->get('estrategiafo2'),
                    'estrategiafo3' => $request->get('estrategiafo3'),
                    'estrategiafo4' => $request->get('estrategiafo4'),
                    'estrategiafo5' => $request->get('estrategiafo5'),
                    //estrategiasdo
                    'estrategiado1' => $request->get('estrategiado1'),
                    'estrategiado2' => $request->get('estrategiado2'),
                    'estrategiado3' => $request->get('estrategiado3'),
                    'estrategiado4' => $request->get('estrategiado4'),
                    'estrategiado5' => $request->get('estrategiado5'),
                    //estrategiasdo
                    'estrategiado1' => $request->get('estrategiado1'),
                    'estrategiado2' => $request->get('estrategiado2'),
                    'estrategiado3' => $request->get('estrategiado3'),
                    'estrategiado4' => $request->get('estrategiado4'),
                    'estrategiado5' => $request->get('estrategiado5'),
                    //amenazas
                    'amenaza1' => $request->get('amenaza1'),
                    'amenaza2' => $request->get('amenaza2'),
                    'amenaza3' => $request->get('amenaza3'),
                    'amenaza4' => $request->get('amenaza4'),
                    'amenaza5' => $request->get('amenaza5'),
                    //estrategiasfa
                    'estrategiafa1' => $request->get('estrategiafa1'),
                    'estrategiafa2' => $request->get('estrategiafa2'),
                    'estrategiafa3' => $request->get('estrategiafa3'),
                    'estrategiafa4' => $request->get('estrategiafa4'),
                    'estrategiafa5' => $request->get('estrategiafa5'),
                    //estrategiasfa
                    'estrategiada1' => $request->get('estrategiada1'),
                    'estrategiada2' => $request->get('estrategiada2'),
                    'estrategiada3' => $request->get('estrategiada3'),
                    'estrategiada4' => $request->get('estrategiada4'),
                    'estrategiada5' => $request->get('estrategiada5'),
                ]);
        } else {
            $matriz_dofa = DB::table('matriz_dofa')->insert([
                'nit' => $request->get('nit'),
                //fortalezas
                'fortaleza1' => $request->get('fortaleza1'),
                'fortaleza2' => $request->get('fortaleza2'),
                'fortaleza3' => $request->get('fortaleza3'),
                'fortaleza4' => $request->get('fortaleza4'),
                'fortaleza5' => $request->get('fortaleza5'),
                //debilidades
                'debilidad1' => $request->get('debilidad1'),
                'debilidad2' => $request->get('debilidad2'),
                'debilidad3' => $request->get('debilidad3'),
                'debilidad4' => $request->get('debilidad4'),
                'debilidad5' => $request->get('debilidad5'),
                //oportunidades
                'oportunidad1' => $request->get('oportunidad1'),
                'oportunidad2' => $request->get('oportunidad2'),
                'oportunidad3' => $request->get('oportunidad3'),
                'oportunidad4' => $request->get('oportunidad4'),
                'oportunidad5' => $request->get('oportunidad5'),
                //estrategiasfo
                'estrategiafo1' => $request->get('estrategiafo1'),
                'estrategiafo2' => $request->get('estrategiafo2'),
                'estrategiafo3' => $request->get('estrategiafo3'),
                'estrategiafo4' => $request->get('estrategiafo4'),
                'estrategiafo5' => $request->get('estrategiafo5'),
                //estrategiasdo
                'estrategiado1' => $request->get('estrategiado1'),
                'estrategiado2' => $request->get('estrategiado2'),
                'estrategiado3' => $request->get('estrategiado3'),
                'estrategiado4' => $request->get('estrategiado4'),
                'estrategiado5' => $request->get('estrategiado5'),
                //estrategiasdo
                'estrategiado1' => $request->get('estrategiado1'),
                'estrategiado2' => $request->get('estrategiado2'),
                'estrategiado3' => $request->get('estrategiado3'),
                'estrategiado4' => $request->get('estrategiado4'),
                'estrategiado5' => $request->get('estrategiado5'),
                //amenazas
                'amenaza1' => $request->get('amenaza1'),
                'amenaza2' => $request->get('amenaza2'),
                'amenaza3' => $request->get('amenaza3'),
                'amenaza4' => $request->get('amenaza4'),
                'amenaza5' => $request->get('amenaza5'),
                //estrategiasfa
                'estrategiafa1' => $request->get('estrategiafa1'),
                'estrategiafa2' => $request->get('estrategiafa2'),
                'estrategiafa3' => $request->get('estrategiafa3'),
                'estrategiafa4' => $request->get('estrategiafa4'),
                'estrategiafa5' => $request->get('estrategiafa5'),
                //estrategiasfa
                'estrategiada1' => $request->get('estrategiada1'),
                'estrategiada2' => $request->get('estrategiada2'),
                'estrategiada3' => $request->get('estrategiada3'),
                'estrategiada4' => $request->get('estrategiada4'),
                'estrategiada5' => $request->get('estrategiada5'),
            ]);
        }

        if ($matriz_dofa == 1) {
            Alert::success('Exitoso', 'Matriz guardada');
            return back();
        } else {
            Alert::warning('Advertencia', 'Oops Vuelve a intentarlo');
            return back();
        }
    }

    public function deleteDofa($id)
    {
        $dofa = DB::table('matriz_dofa')
            ->where('nit', $id)
            ->delete();

        if ($dofa == 1) {
            Alert::success('Exitoso', 'Los campos se limpiaron con exito');
            return back();
        } else {
            Alert::warning('Advertencia', 'Algo fallo, intentelo de nuevo');
            return back();
        }
    }

    //PDF
    public function pdfDofa($id)
    {
        $dofa = DB::table('matriz_dofa')
            ->join('empresas', 'matriz_dofa.nit', '=', 'empresas.nit')
            ->where('matriz_dofa.nit', $id)
            ->first();
        $view = \view('diagnostico/dofa.pdf', compact('dofa'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->setPaper('a4', 'landscape');
        $pdf->loadHTML($view);
        return $pdf->stream('matriz_dofa.pdf');
    }

    //Tablero de control
    public function tableroControl($id)
    {
        $empresa = DB::table('empresas')
            ->where('nit', $id)
            ->first();
        $tableros = DB::table('tabla_control')
            ->where('nit', $id)
            ->get();
        $permisos = DB::table('roles_permisos')
            ->where('id_rol', Auth::user()->rol)
            ->get();
        return view('diagnostico/faseII/tablero_control.index', compact('permisos', 'empresa', 'tableros'));
    }

    public function registroTablero(Request $request)
    {
        $tablero = DB::table('tabla_control')->insert([
            'nit' => $request->get('nit'),
            'perspectiva' => $request->get('perspectiva'),
            'objetivo' => $request->get('objetivo'),
            'indicador' => $request->get('indicador'),
            'meta' => $request->get('meta'),
        ]);
        if ($tablero == 1) {
            Alert::success('Exitoso', 'Tablero de control actualizado');
            return back();
        } else {
            Alert::warning('Advertencia', 'Algo fallo, intentelo de nuevo');
            return back();
        }
    }

    public function eliminarRegistroTablero($id)
    {
        $tablero = DB::table('tabla_control')
            ->where('id', $id)
            ->delete();
        if ($tablero == 1) {
            return back();
        } else {
            Alert::warning('Advertencia', 'Algo fallo, intentelo de nuevo');
            return back();
        }
    }

    public function imagenCorporativa($nit){
        $permisos = DB::table('roles_permisos')
            ->where('id_rol', Auth::user()->rol)
            ->get();
        return view('diagnostico/faseII/marketing.index', compact('permisos'));
    }

}
