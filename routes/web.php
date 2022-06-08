<?php

use App\Http\Controllers\DiagnosticoController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\GraficoController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Models\Rol;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/home');
    } else {
        return view('auth.login');
    }
});

Auth::routes();

Route::get('diagnostico/{nit}/pdf', [DiagnosticoController::class, 'pdfDiagnostico']);
Route::get('diagnostico/fase1', [DiagnosticoController::class, 'index']);
Route::get('diagnostico/dofa', [DiagnosticoController::class, 'mdofa']);
Route::get('diagnostico/{nit}/crear-dofa', [DiagnosticoController::class, 'mcrear']);
Route::get('diagnostico/{nit}/analisis', [DiagnosticoController::class, 'analisis']);
Route::get('diagnostico/individual', [DiagnosticoController::class, 'analisis_individual']);


Route::put('diagnostico/{nit}/mision', [DiagnosticoController::class, 'mision']);
Route::put('diagnostico/{nit}/vision', [DiagnosticoController::class, 'vision']);
Route::put('diagnostico/{nit}/objestrategico', [DiagnosticoController::class, 'objestrategico']);
Route::put('diagnostico/{nit}/perspectivacrecimientodesarrollo', [DiagnosticoController::class, 'perspectivacrecimientodesarrollo']);
Route::put('diagnostico/{nit}/perspectivacliente', [DiagnosticoController::class, 'perspectivacliente']);
Route::put('diagnostico/{nit}/perspectivaprocesosinternos', [DiagnosticoController::class, 'perspectivaprocesosinternos']);
Route::put('diagnostico/{nit}/perspectivafinanciera', [DiagnosticoController::class, 'perspectivafinanciera']);
Route::get('diagnostico/{nit}/pdfAnalisis', [DiagnosticoController::class, 'pdfAnalisis']);
Route::get('diagnostico/{nit}/pdfDofa', [DiagnosticoController::class, 'pdfDofa']);

Route::get('diagnostico/asignacion', [DiagnosticoController::class, 'asignacion']);
Route::put('diagnostico/{nit}/storedofa', [DiagnosticoController::class, 'storedofa']);


Route::get('usuario/{slug}/pefil', [UsuarioController::class, 'perfil']);

Route::resource('rol', RolController::class);
Route::resource('usuario', UsuarioController::class);
Route::resource('empresa', EmpresaController::class);
Route::resource('diagnostico', DiagnosticoController::class);
Route::resource('grafico', GraficoController::class);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
