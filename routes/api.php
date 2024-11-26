<?php

use App\Http\Controllers\Api\CiudadController;
use App\Http\Controllers\Api\ClienteController;
use App\Http\Controllers\Api\ColaboradorController;
use App\Http\Controllers\Api\FacturaController;
use App\Http\Controllers\Api\GoogleCloudVisionController;
use App\Http\Controllers\Api\MedicionController;
use App\Http\Controllers\Api\NotificacionController;
use App\Http\Controllers\Api\PagoController;
use App\Http\Controllers\Api\ReporteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('cliente/login', [ClienteController::class, 'login']);
Route::post('cliente/registroDispositivo', [ClienteController::class, 'registroDispositivo']);
Route::post('cliente/enviarCodigoRecuperacionPassword', [ClienteController::class, 'enviarCodigoRecuperacionPassword']);
Route::post('cliente/validarCodigoRecuperacionPassword', [ClienteController::class, 'validarCodigoRecuperacionPassword']);
Route::post('cliente/nuevoPassword', [ClienteController::class, 'nuevoPassword']);
Route::post('cliente/editarPerfil', [ClienteController::class, 'editarPerfil']);

Route::post('colaborador/login', [ColaboradorController::class, 'login']);
Route::post('colaborador/registroDispositivo', [ColaboradorController::class, 'registroDispositivo']);
Route::post('colaborador/editarPerfil', [ColaboradorController::class, 'editarPerfil']);

Route::post('medicion/listar', [MedicionController::class, 'listar']);
Route::post('medicion/capturar', [MedicionController::class, 'capturar']);

Route::post('ciudad/precioMensualidad', [CiudadController::class, 'precioMensualidad']);

Route::post('factura/listar', [FacturaController::class, 'listar']);
Route::post('factura/generarFactura', [FacturaController::class, 'generarFactura']);

Route::get('reporte/reporteMedicion/{idMedicion}', [ReporteController::class, 'reporteMedicion']);
Route::get('reporte/reporteFactura/{idFactura}', [ReporteController::class, 'reporteFactura']);

Route::post('notificacion/enviarNotificacion', [NotificacionController::class, 'enviarNotificacion']);

Route::get('pago/{token}', [PagoController::class, 'index']);
Route::post('pago/confirmar', [PagoController::class, 'confirmar']);
Route::post('pago/callback/{token}', [PagoController::class, 'callback']);

Route::post('googleCloudVision/analizarImagen', [GoogleCloudVisionController::class, 'analizarImagen']);
