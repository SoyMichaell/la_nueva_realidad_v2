<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'tipo_documento' => 'required|not_in:0',
            'numero_documento' => 'required',
            'nombre' => 'required',
            'apellido' => 'required',
            'correo_institucional' => 'required',
            'password' => 'required',
            'confirm_password' => 'required',
            'telefono' => 'required',
            'rol' => 'required|not_in:0',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

        $slug = $data['nombre'].''.$data['apellido'];
        $slug_v2 = ucfirst(str_replace('','-',$slug));

        if($data['password'] == $data['confirm_password']){
            return User::create([
                'tipo_documento' => $data['tipo_documento'],
                'numero_documento' => $data['numero_documento'],
                'nombre' => $data['nombre'],
                'apellido' => $data['apellido'],
                'correo_institucional' => $data['correo_institucional'],
                'correo_personal' => $data['correo_personal'],
                'password' => Hash::make($data['password']),
                'telefono' => $data['telefono'],
                'nivel_programa' => $data['nivel_programa'],
                'programa' => $data['programa'],
                'estado' => 'Activo',
                'slug' => $slug_v2,
                'rol' => $data['rol'],
            ]);
        }else{
            return back();
        }
        
        
    }
}
