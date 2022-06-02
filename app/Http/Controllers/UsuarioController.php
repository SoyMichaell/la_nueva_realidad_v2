<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UsuarioController extends Controller
{

    public function index(Request $request)
    {
        $usuarios = DB::table('users')
            ->select(
                'users.id as idUser',
                'tipo_documento',
                'numero_documento',
                'nombre',
                'apellido',
                'correo_institucional',
                'telefono',
                'rol',
                'slug',
                'estado',
                'nombre_rol',
                'correo_personal',
                'nivel_programa',
                'programa',
                'roles.id as idRol'
            )
            ->join('roles', 'users.rol', '=', 'roles.id')
            ->orderBy('nombre', 'asc')
            ->get();
        $permisos = DB::table('roles_permisos')->where('id_rol', Auth::user()->rol)->get();
        return view('usuarios.index', compact('usuarios','permisos'));
    }

    public function create()
    {
        $roles = DB::table('roles')->get();
        $permisos = DB::table('roles_permisos')->where('id_rol', Auth::user()->rol)->get();
        return view('usuarios.crear', compact('roles','permisos'));
    }

    public function store(Request $request)
    {

        $rules = [
            'tipo_documento' => 'required|not_in:0',
            'numero_documento' => 'required',
            'nombre' => 'required',
            'apellido' => 'required',
            'correo_institucional' => 'required',
            'password' => 'required',
            'telefono' => 'required',
            'estado' => 'required|not_in:0',
            'rol' => 'required|not_in:0',
        ];

        $message = [
            'tipo_documento.required' => 'El campo tipo documento es requerido',
            'numero_documento.required' => 'El campo numero de documento es requerido',
            'nombre.required' => 'El campo nombre es requerido',
            'apellido.required' => 'El campo apellido es requerido',
            'correo_institucional.required' => 'El campo correo electronico es requerido',
            'password.required' => 'El campo contraseña es requerido',
            'telefono.required' => 'El campo telefono es requerido',
            'estado.required' => 'El campo estado es requerido',
            'rol.required' => 'El campo rol es requerido',
        ];

        $this->validate($request, $rules, $message);

        $slug = $request->get('nombre') . '-' . $request->get('apellido');

        $sludModificado = str_replace(" ", "-", $slug);

        strtolower($sludModificado);

        if ($request->password == $request->password_confirmation) {
            DB::table('users')->insert(
                [
                    'tipo_documento' => $request->get('tipo_documento'),
                    'numero_documento' => $request->get('numero_documento'),
                    'nombre' => $request->get('nombre'),
                    'apellido' => $request->get('apellido'),
                    'correo_institucional' => $request->get('correo_institucional'),
                    'correo_personal' => $request->get('correo_personal'),
                    'password' => Hash::make($request->get('password')),
                    'telefono' => $request->get('telefono'),
                    'nivel_programa' => $request->get('nivel_programa'),
                    'programa' => $request->get('programa'),
                    'estado' => $request->get('estado'),
                    'slug' => $sludModificado,
                    'rol' => $request->get('rol'),
                ]
            );
            //Alert::success('Exitoso', 'La información se ha registrado con exito');
            return redirect('/usuario');
        } else {
            return view('usuarios.index');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($slug)
    {
        $usuario = DB::table('users')
            ->select(
                'users.id as idUser',
                'tipo_documento',
                'numero_documento',
                'nombre',
                'apellido',
                'correo_institucional',
                'telefono',
                'rol',
                'slug',
                'estado',
                'nombre_rol',
                'correo_personal',
                'nivel_programa',
                'programa',
                'roles.id as idRol'
            )
            ->join('roles', 'users.rol', '=', 'roles.id')
            ->where('users.slug', $slug)
            ->first();
        $roles = DB::table('roles')->get();
        $permisos = DB::table('roles_permisos')->where('id_rol', Auth::user()->rol)->get();
        return view('usuarios.editar', compact('usuario', 'roles','permisos'));
    }

    public function update(Request $request, $slug)
    {
        $rules = [
            'tipo_documento' => 'required|not_in:0',
            'numero_documento' => 'required',
            'nombre' => 'required',
            'apellido' => 'required',
            'correo_institucional' => 'required',
            'telefono' => 'required',
            'estado' => 'required|not_in:0',
            'rol' => 'required|not_in:0',
        ];

        $message = [
            'tipo_documento.required' => 'El campo tipo documento es requerido',
            'numero_documento.required' => 'El campo numero de documento es requerido',
            'nombre.required' => 'El campo nombre es requerido',
            'apellido.required' => 'El campo apellido es requerido',
            'correo_institucional.required' => 'El campo correo electronico es requerido',
            'telefono.required' => 'El campo telefono es requerido',
            'estado.required' => 'El campo estado es requerido',
            'rol.required' => 'El campo rol es requerido',
        ];

        $this->validate($request, $rules, $message);

        $slug = $request->get('nombre') . '-' . $request->get('apellido');

        $sludModificado = str_replace(" ", "-", $slug);

        $minuscula = strtolower($sludModificado);

        $actualizarUsuario = DB::table('users')
            ->where('slug', $minuscula)
            ->update(
                [
                    'tipo_documento' => $request->get('tipo_documento'),
                    'numero_documento' => $request->get('numero_documento'),
                    'nombre' => $request->get('nombre'),
                    'apellido' => $request->get('apellido'),
                    'correo_institucional' => $request->get('correo_institucional'),
                    'correo_personal' => $request->get('correo_personal'),
                    'telefono' => $request->get('telefono'),
                    'nivel_programa' => $request->get('nivel_programa'),
                    'programa' => $request->get('programa'),
                    'estado' => $request->get('estado'),
                    'slug' => $minuscula,
                    'rol' => $request->get('rol'),
                ]
            );

        if ($actualizarUsuario == 1) {
            //Alert::success('Exitoso', 'La información se ha actualizado con exito');
            return redirect('/usuario');
        } else {
            //Alert::success('warning', 'Algo salio mal intentelo más tarde');
            return redirect('/usuario');
        }
    }

    public function destroy($id)
    {
        $usuario = User::find($id);
        $usuario->delete();
        //Alert::success('Exitoso', 'El registro se ha eliminado');
        return redirect('/usuario');
    }

    //Perfil
    public function perfil($slug){
        $usuario = DB::table('users')->where('slug', $slug);
        return view('usuarios.perfil', compact('usuario'));
    }
}
