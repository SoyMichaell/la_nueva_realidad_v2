<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class EmpresaController extends Controller
{

    public function index()
    {
        $empresas = DB::table('empresas')->select('empresas.id','nit','razon_social','correo','telefono1','direccion','municipio','estado')->limit(13800)->get();
        $permisos = DB::table('roles_permisos')->where('id_rol', Auth::user()->rol)->get();
        return view('empresas.index', compact('empresas','permisos'));
    }


    public function create()
    {
        $permisos = DB::table('roles_permisos')->where('id_rol', Auth::user()->rol)->get();
        return view('empresas.crear',compact('permisos'));
    }


    public function store(Request $request)
    {
        $rules = [
            'razon_social' => 'required',
            'nit' => 'required',
            'direccion' => 'required',
            'municipio' => 'required',
            'telefono1' => 'required',
            'correo' => 'required',
            'estado' => 'required|not_in:0',
        ];

        $message = [
            'razon_social.required' => 'El campo razón social es requerido',
            'nit.required' => 'El campo nit es requerido',
            'direccion.required' => 'El campo dirección es requerido',
            'municipio.required' => 'El campo municipio es requerido',
            'telefono1.required' => 'El campo telefono 1 es requerido',
            'correo.required' => 'El campo correo electronico es requerido',
            'estado.required' => 'El campo estado es requerido'
        ];

        $this->validate($request, $rules, $message);

        DB::table('empresas')->insert([
            'matricula' => $request->get('matricula'),
            'organizacion' => $request->get('organizacion'),
            'categoria' => $request->get('categoria'),
            'razon_social' => $request->get('razon_social'),
            'identificacion' => $request->get('identificacion'),
            'nit' => $request->get('nit'),
            'fecha_matricula' => $request->get('fecha_matricula'),
            'fecha_renovacion' => $request->get('fecha_renovacion'),
            'direccion' => $request->get('direccion'),
            'municipio' => $request->get('municipio'),
            'telefono1' => $request->get('telefono1'),
            'telefono2' => $request->get('telefono2'),
            'telefono3' => $request->get('telefono3'),
            'correo' => $request->get('correo'),
            'ciiu_1' => $request->get('ciiu_1'),
            'ciiu_2' => $request->get('ciiu_2'),
            'ciiu_3' => $request->get('ciiu_3'),
            'ciiu_4' => $request->get('ciiu_4'),
            'numero_persona' => $request->get('numero_persona'),
            'activo_total' => $request->get('activo_total'),
            'numero_persona' => $request->get('numero_persona'),
            'representante' => $request->get('representante'),
            'autorizacion' => $request->get('autorizacion'),
            'year' => $request->get('year'),
            'estado' => $request->get('estado'),
            'estado_35' => $request->get('estado_35')
        ]);

        //Alert::success('Exitoso', 'El registro se ha realizado con exito');
        return redirect('/empresa');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $empresa = Empresa::find($id);
        $permisos = DB::table('roles_permisos')->where('id_rol', Auth::user()->rol)->get();
        return view('empresas.editar', compact('empresa','permisos'));
    }


    public function update(Request $request, $id)
    {
        $rules = [
            'razon_social' => 'required',
            'nit' => 'required',
            'direccion' => 'required',
            'municipio' => 'required',
            'telefono1' => 'required',
            'correo' => 'required',
            'estado' => 'required|not_in:0',
        ];

        $message = [
            'razon_social.required' => 'El campo razón social es requerido',
            'nit.required' => 'El campo nit es requerido',
            'direccion.required' => 'El campo dirección es requerido',
            'municipio.required' => 'El campo municipio es requerido',
            'telefono1.required' => 'El campo telefono 1 es requerido',
            'correo.required' => 'El campo correo electronico es requerido',
            'estado.required' => 'El campo estado es requerido'
        ];

        $this->validate($request, $rules, $message);

        DB::table('empresas')->where('id', $id)->update([
            'matricula' => $request->get('matricula'),
            'organizacion' => $request->get('organizacion'),
            'categoria' => $request->get('categoria'),
            'razon_social' => $request->get('razon_social'),
            'identificacion' => $request->get('identificacion'),
            'nit' => $request->get('nit'),
            'fecha_matricula' => $request->get('fecha_matricula'),
            'fecha_renovacion' => $request->get('fecha_renovacion'),
            'direccion' => $request->get('direccion'),
            'municipio' => $request->get('municipio'),
            'telefono1' => $request->get('telefono1'),
            'telefono2' => $request->get('telefono2'),
            'telefono3' => $request->get('telefono3'),
            'correo' => $request->get('correo'),
            'ciiu_1' => $request->get('ciiu_1'),
            'ciiu_2' => $request->get('ciiu_2'),
            'ciiu_3' => $request->get('ciiu_3'),
            'ciiu_4' => $request->get('ciiu_4'),
            'numero_persona' => $request->get('numero_persona'),
            'activo_total' => $request->get('activo_total'),
            'numero_persona' => $request->get('numero_persona'),
            'representante' => $request->get('representante'),
            'autorizacion' => $request->get('autorizacion'),
            'year' => $request->get('year'),
            'estado' => $request->get('estado'),
            'estado_35' => $request->get('estado_35')
        ]);

        //Alert::success('Exitoso', 'El registro se ha actualizado con exito');
        return redirect('/empresa');
    }


    public function destroy($id)
    {
        $empresa = Empresa::find($id);
        $empresa->delete();
        //Alert::success('Exitoso', 'El registro se ha eliminado');
        return redirect('/empresa');
    }
}
