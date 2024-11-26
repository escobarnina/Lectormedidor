<?php

use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CiudadController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ColaboradorController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\GestionController;
use App\Http\Controllers\MedicionController;
use App\Http\Controllers\MensualidadController;
use App\Http\Controllers\ReporteController;
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


Auth::routes();


Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/dashboard');
    } else {
        return view('auth.login');
    }
})->name('login');


Route::get('/error', function () {
    if (Auth::check()) {
        return view('error');
    } else {
        return redirect('/');
    }
});


Route::post('logout', [LoginController::class, 'logout']);
Route::get('login', [LoginController::class, 'redirectLogin']);
Route::post('login', [LoginController::class, 'login']);


Route::get('/login', function () {
    if (Auth::check()) {
        return redirect('/dashboard');
    } else {
        return redirect('/');
    }
});

Route::get('/home', function () {
    if (Auth::check()) {
        return redirect('/dashboard');
    } else {
        return redirect('/login');
    }
});



Route::get('dashboard', [DashboardController::class, 'index']);

Route::get('administrador', [AdministradorController::class, 'index']);
Route::get('administrador/create', [AdministradorController::class, 'create']);
Route::post('administrador/create', [AdministradorController::class, 'store']);
Route::get('administrador/search', [AdministradorController::class, 'search']);
Route::get('administrador/{id}', [AdministradorController::class, 'show']);
Route::get('administrador/{id}/edit', [AdministradorController::class, 'edit']);
Route::post('administrador/update', [AdministradorController::class, 'update']);
Route::post('administrador/estado', [AdministradorController::class, 'updateEstado']);
Route::post('administrador/delete', [AdministradorController::class, 'destroy']);


Route::get('ciudad', [CiudadController::class, 'index']);
Route::get('ciudad/create', [CiudadController::class, 'create']);
Route::post('ciudad/create', [CiudadController::class, 'store']);
Route::get('ciudad/{idciudad}/edit', [CiudadController::class, 'edit']);
Route::post('ciudad/update', [CiudadController::class, 'update']);
Route::post('ciudad/delete', [CiudadController::class, 'destroy']);
Route::get('ciudad/{id}', [CiudadController::class, 'show']);

Route::get('colaborador', [ColaboradorController::class, 'index']);
Route::get('colaborador/create', [ColaboradorController::class, 'create']);
Route::post('colaborador/create', [ColaboradorController::class, 'store']);
Route::get('colaborador/search', [ColaboradorController::class, 'search']);
Route::get('colaborador/{id}', [ColaboradorController::class, 'show']);
Route::get('colaborador/{id}/edit', [ColaboradorController::class, 'edit']);
Route::post('colaborador/update', [ColaboradorController::class, 'update']);
Route::post('colaborador/estado', [ColaboradorController::class, 'updateEstado']);
Route::post('colaborador/delete', [ColaboradorController::class, 'destroy']);


Route::get('cliente', [ClienteController::class, 'index']);
Route::get('cliente/create', [ClienteController::class, 'create']);
Route::post('cliente/create', [ClienteController::class, 'store']);
Route::get('cliente/search', [ClienteController::class, 'search']);
Route::get('cliente/{id}', [ClienteController::class, 'show']);
Route::get('cliente/{id}/edit', [ClienteController::class, 'edit']);
Route::post('cliente/update', [ClienteController::class, 'update']);
Route::post('cliente/estado', [ClienteController::class, 'updateEstado']);
Route::post('cliente/delete', [ClienteController::class, 'destroy']);


Route::get('gestion', [GestionController::class, 'index']);
Route::get('gestion/create', [GestionController::class, 'create']);
Route::post('gestion/create', [GestionController::class, 'store']);
Route::get('gestion/search', [GestionController::class, 'search']);
Route::get('gestion/{id}', [GestionController::class, 'show']);
Route::get('gestion/{id}/edit', [GestionController::class, 'edit']);
Route::post('gestion/update', [GestionController::class, 'update']);
Route::post('gestion/delete', [GestionController::class, 'destroy']);


Route::get('mensualidad', [MensualidadController::class, 'index']);
Route::get('mensualidad/create', [MensualidadController::class, 'create']);
Route::post('mensualidad/create', [MensualidadController::class, 'store']);
Route::get('mensualidad/search', [MensualidadController::class, 'search']);
Route::get('mensualidad/{id}', [MensualidadController::class, 'show']);
Route::get('mensualidad/{id}/edit', [MensualidadController::class, 'edit']);
Route::post('mensualidad/update', [MensualidadController::class, 'update']);
Route::post('mensualidad/delete', [MensualidadController::class, 'destroy']);


Route::get('medicion', [MedicionController::class, 'index']);
Route::get('medicion/create', [MedicionController::class, 'create']);
Route::post('medicion/create', [MedicionController::class, 'store']);
Route::get('medicion/search', [MedicionController::class, 'search']);
Route::get('medicion/{id}', [MedicionController::class, 'show']);
Route::get('medicion/{id}/edit', [MedicionController::class, 'edit']);
Route::post('medicion/update', [MedicionController::class, 'update']);
Route::get('medicionExcel/{idCiudad}/{idMensualidad}/{idColaborador}/{estado}', [MedicionController::class, 'medicionExcel']);


Route::get('factura', [FacturaController::class, 'index']);
Route::get('factura/search', [FacturaController::class, 'search']);
Route::get('factura/{id}', [FacturaController::class, 'show']);
Route::get('facturaExcel/{idCiudad}/{idMensualidad}/{idColaborador}/{pagado}', [FacturaController::class, 'facturaExcel']);


Route::get('reporte/reporteGeneral', [ReporteController::class, 'reporteGeneral']);
Route::get('reporte/generarReporteGeneral/{idCiudad}/{idMensualidad}/{idColaborador}/{idCliente}/{estado}/{pagado}', [ReporteController::class, 'generarReporteGeneral']);
Route::get('reporte/reporteMedicion/{idMedicion}', [ReporteController::class, 'reporteMedicion']);
Route::get('reporte/reporteFactura/{idFactura}', [ReporteController::class, 'reporteFactura']);
