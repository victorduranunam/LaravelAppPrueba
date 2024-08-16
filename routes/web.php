<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
})->middleware(['auth'])->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware('auth')->group(function () {
    Route::get('/AppPrueba/formulario', [FormController::class, 'create'])->name('formulario.create');
    Route::post('/AppPrueba/formulario', [FormController::class, 'store'])->name('formulario.store');
});



Route::get('/AppPrueba/usuario', [UserController::class, 'index'])->name('usuario.index');
Route::delete('/usuario/{id}/borrar', [UserController::class, 'delete'])->name('usuario.delete');
Route::get('/usuario/{id}/editar', [UserController::class, 'edit'])->name('usuario.edit');
Route::put('/usuario/{id}/modificar', [UserController::class, 'update'])->name('usuario.update');
Route::get('/AppPrueba/agregar', [UserController::class, 'show'])->name('usuario.show');
Route::post('/AppPrueba/store', [UserController::class, 'store'])->name('usuario.store');

Route::get('/AppPrueba/probarApi', [probarApiController::class, 'index'])->name('usuario.index');





require __DIR__.'/auth.php';
