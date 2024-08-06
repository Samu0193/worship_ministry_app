<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CancionesController;
use App\Http\Controllers\Api\ListasController;
use App\Http\Controllers\Api\ListaCancionesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Public accessible API
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Authenticated only API
// We use auth api here as a middleware so only authenticated user who can access the endpoint
// We use group so we can apply middleware auth api to all the routes within the group
Route::middleware('auth:api')->group(function() {
    Route::get('/me', [UserController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

// Rutas de Canciones
Route::get('/canciones', [CancionesController::class, 'index']);
Route::post('/canciones', [CancionesController::class, 'store']);
Route::get('/canciones/{id}', [CancionesController::class, 'show']);
Route::put('/canciones/{id}', [CancionesController::class, 'update']);
Route::delete('/canciones/{id}', [CancionesController::class, 'destroy']);

// Rutas de Listas
Route::get('/listas', [ListasController::class, 'index']);
Route::post('/listas', [ListasController::class, 'store']);
Route::get('/listas/{id}', [ListasController::class, 'show']);
Route::put('/listas/{id}', [ListasController::class, 'update']);
Route::delete('/listas/{id}', [ListasController::class, 'destroy']);

// Rutas de ListaCanciones
Route::get('/listas/{listaId}/canciones', [ListaCancionesController::class, 'mostrarCanciones']);
Route::get('/listacanciones/{listaId}', [ListaCancionesController::class, 'mostrarCanciones']);
Route::post('/listacanciones', [ListaCancionesController::class, 'store']);
Route::get('/listacanciones/{id}', [ListaCancionesController::class, 'show']);
Route::put('/listacanciones/{id}', [ListaCancionesController::class, 'update']);
Route::delete('/listacanciones/{id}', [ListaCancionesController::class, 'destroy']);

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
