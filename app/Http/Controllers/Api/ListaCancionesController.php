<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ModelListaCanciones;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse; // Asegúrate de usar el espacio de nombres correcto
use Illuminate\Support\Facades\Validator;

class ListaCancionesController extends Controller
{

    /**
     * Muestra las canciones de una lista específica.
     *
     * @param int $listaId
     * @return JsonResponse
     */
    public function mostrarCanciones($listaId): JsonResponse
    {
        $canciones = ModelListaCanciones::obtenerCancionesPorLista($listaId);

        return response()->json($canciones);
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
