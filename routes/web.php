<?php
use App\Http\Controllers\FormController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\probarAPIController;


use GuzzleHttp\Client;



use Illuminate\Support\Facades\Route;





/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/AppPrueba', function () {
    return view('welcome');
});


Route::get('/AppPrueba/Variables', function () {
    $nombre_aplicacion = env('APP_NAME');
    return response()->make("
        <!DOCTYPE html>
        <html>
        <head>
            <title>Página - Home</title>
        </head>
        <body>
            <h3> Home </h3>
            <h5> {$nombre_aplicacion} </h5>
        </body>
        </html>
    ", 200);
});

Route::get('/AppPrueba/formulario', [FormController::class, 'create'])->name('formulario.create');
Route::post('/AppPrueba/formulario', [FormController::class, 'store'])->name('formulario.store');

Route::get('/AppPrueba/usuario', [UserController::class, 'index'])->name('usuario.index');
Route::delete('/usuario/{id}/borrar', [UserController::class, 'delete'])->name('usuario.delete');
Route::get('/usuario/{id}/editar', [UserController::class, 'edit'])->name('usuario.edit');
Route::put('/usuario/{id}/modificar', [UserController::class, 'update'])->name('usuario.update');
Route::get('/AppPrueba/agregar', [UserController::class, 'show'])->name('usuario.show');
Route::post('/AppPrueba/store', [UserController::class, 'store'])->name('usuario.store');

Route::get('/AppPrueba/probarApi', [probarApiController::class, 'index'])->name('usuario.index');
