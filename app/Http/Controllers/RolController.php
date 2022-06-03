<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class RolController extends Controller
{
    public function index()
    {
        $roles = Rol::all();
        $permisos = DB::table('roles_permisos')->where('id_rol', Auth::user()->rol)->get();
        return view('roles.index', compact('roles','permisos'));
    }

    public function create()
    {
        $permisosbd = DB::table('permisos')->get();
        $permisos = DB::table('roles_permisos')->where('id_rol', Auth::user()->rol)->get();
        return view('roles.crear', compact('permisosbd','permisos'));
    }

    public function store(Request $request)
    {
        $rules = ['nombre_rol' => 'required'];
        $message = ['nombre_rol.required' => 'El campo nombre rol es requerido'];
        $this->validate($request, $rules, $message);

        $role = DB::table('roles')->insert(['nombre_rol' => $request->get('nombre_rol')]);
        $id = DB::getPdo()->lastInsertId();

        if ($role == 1) {
            foreach ($request->get('permisos_rol') as $rol) {
                DB::table('roles_permisos')->insert([
                    'id_rol' => $id,
                    'permiso' => $rol
                ]);
            }
            Alert::sucess('Exitoso','Rol creado con exito');
            return redirect('/rol');
        } else {
            return redirect('/rol');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $rol = Rol::find($id);
        $permisosbd = DB::table('permisos')->get();
        $permisos = DB::table('roles_permisos')->where('id_rol', Auth::user()->rol)->get();
        $has_rol_permiso = DB::table('roles_permisos')->where('id_rol', $id)->get();
        return view('roles.editar', compact('rol', 'permisosbd', 'has_rol_permiso','permisos'));
    }

    public function update(Request $request, $id)
    {

        $permisos = DB::table('roles_permisos')->where('id_rol', $id)->get();

        if (count($permisos) > 0) {
            DB::table('roles_permisos')->where('id_rol', $id)->delete();
            foreach ($request->get('permisos_rol') as $rol) {
                DB::table('roles_permisos')
                    ->where('id_rol', $id)
                    ->update([
                        'id_rol' => $id,
                        'permiso' => $rol
                    ]);
            }
        } else {
            foreach ($request->get('permisos_rol') as $rol) {
                DB::table('roles_permisos')
                    ->insert([
                        'id_rol' => $id,
                        'permiso' => $rol
                    ]);
            }
        }

        Alert::success('Exitoso', 'El rol se ha actualizado');
        return redirect('/rol');
    }

    public function destroy($id)
    {
        DB::table('roles_permisos')->where('id_rol', $id)->delete();
        DB::table('roles')->where('id', $id)->delete();
        //Alert::success('Exitoso', 'El rol se ha eliminado');
        return redirect('/rol');
    }
}
