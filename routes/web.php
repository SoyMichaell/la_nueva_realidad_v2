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
Route::get('diagnostico/{nit}/crear-dofa', [DiagnosticoController::class, 'mcrear']);
Route::get('diagnostico/{nit}/analisis', [DiagnosticoController::class, 'analisis']);
Route::get('diagnostico/individual', [DiagnosticoController::class, 'analisis_individual']);


Route::put('diagnostico/{nit}/guardarAnalisis', [DiagnosticoController::class, 'guardarAnalisis']);
Route::get('diagnostico/{nit}/pdfAnalisis', [DiagnosticoController::class, 'pdfAnalisis']);
Route::get('diagnostico/{nit}/pdfDofa', [DiagnosticoController::class, 'pdfDofa']);
Route::get('diagnostico/{nit}/deleteDofa', [DiagnosticoController::class, 'deleteDofa']);

Route::get('diagnostico/asignacion', [DiagnosticoController::class, 'asignacion']);
Route::put('diagnostico/{nit}/storedofa', [DiagnosticoController::class, 'storedofa']);

Route::get('diagnostico/{nit}/tablero', [DiagnosticoController::class, 'tableroControl']);
Route::put('diagnostico/{nit}/registroTablero', [DiagnosticoController::class, 'registroTablero']);
Route::get('diagnostico/{nit}/eliminarRegistroTablero', [DiagnosticoController::class, 'eliminarRegistroTablero']);

Route::get('grafico/encuesta', [GraficoController::class, 'graficoEncuesta']);

Route::get('usuario/{slug}/perfil', [UsuarioController::class, 'perfil']);
Route::put('usuario/{slug}/actualizar', [UsuarioController::class, 'actualizar']);

Route::resource('rol', RolController::class);
Route::resource('usuario', UsuarioController::class);
Route::resource('empresa', EmpresaController::class);
Route::resource('diagnostico', DiagnosticoController::class);
Route::resource('grafico', GraficoController::class);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
