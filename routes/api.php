<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnoApiController;
use App\Http\Controllers\ApiUserController;
use App\Http\Controllers\probarAPIController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/AppPrueba/APIalumnos', [AlumnoApiController::class, 'index']);
Route::get('/AppPrueba/probarApi', [probarApiController::class, 'fetchData']);

Route::get('/AppPrueba/usuarios', [ApiUserController::class, 'index'])->middleware('auth:api');
Route::get('/AppPrueba/usuarios/{id}', [ApiUserController::class, 'showByID']);
Route::post('/AppPrueba/usuarios/', [ApiUserController::class, 'store']);
Route::delete('/AppPrueba/usuarios/{id}', [ApiUserController::class, 'destroy']);
Route::put('/AppPrueba/usuarios/{id}', [ApiUserController::class, 'update']);

Route::middleware('auth:api')->get('/AppPrueba/usuarios', function (Request $request) {
    return $request->user();
});
