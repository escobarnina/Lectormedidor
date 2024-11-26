<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Medicion;
use App\Models\Mensualidad;
use Carbon\Carbon;
use Exception;

class MedicionController extends Controller
{

    public function listar(Request $request)
    {
        try {
            $idColaborador = $request->input('idColaborador');
            $estado = $request->input('estado');
            $asignaciones = Medicion::listarAsignacionesPorIdColaboradorYEstado($idColaborador, $estado);
            return response()->json(['codigo' => 0, 'fecha' => Carbon::now()->toDateTimeLocalString(), 'mensaje' => 'Consulta realizada correctamente', 'data' => $asignaciones]);
        } catch (Exception $e) {
            return response()->json(['codigo' => 1, 'fecha' => Carbon::now()->toDateTimeLocalString(), 'mensaje' => $e->getMessage(), 'data' => null]);
        }
    }

    public function capturar(Request $request)
    {
        try {
            // Validación de datos recibidos
            $validatedData = $request->validate([
                'flujo' => 'required|numeric',
                'volumen' => 'required|numeric',
                'umbralConstante' => 'required|numeric',
                'umbralFuga' => 'required|numeric',
            ]);

            // Crear una nueva medición
            $medicion = new Medicion();
            $medicion->idMensualidad = Mensualidad::getMensualidadActualId();
            $medicion->consumo = $validatedData['flujo'];
            $medicion->total = $validatedData['volumen'];
            $medicion->referencia = "Constante: {$validatedData['umbralConstante']}, Fuga: {$validatedData['umbralFuga']}";
            $medicion->estado = 1; // Cambia según la lógica de tu aplicación
            $medicion->idAdministrador = auth()->user()->id; // Asumiendo que el administrador es el usuario autenticado
            $medicion->save();

            // Retornar una respuesta exitosa
            return response()->json([
                'codigo' => 0,
                'mensaje' => 'Medición registrada correctamente',
                'data' => $medicion
            ], 201);
        } catch (Exception $e) {
            // Manejo de errores
            return response()->json([
                'codigo' => 1,
                'mensaje' => $e->getMessage(),
                'data' => null
            ], 500);
        }
    }
}
