<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function chartPerson(){
        $usuarios = DB::table('users')
            ->select('nombre_rol',DB::raw('count(*) as total'))
            ->join('roles','users.rol','=','roles.id')
            ->groupBy('nombre_rol')
            ->get();

        return view('home', compact('usuarios'));
    }
}
