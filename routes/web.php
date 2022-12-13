<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;

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
// CLONACIÓN para turno noche  
//elimina base de datos ------------->>>    php artisan migrate:rollback

Route::get('/', [PagesController::class, 'fnIndex'])->name('xIndex');
Route::post('/', [PagesController::class, 'fnRegistrar'])->name('Estudiante.xRegistrar');

Route::get('/lista', [PagesController::class, 'fnLista'])->name('xLista');
Route::get('/detalle/{id}', [PagesController::class, 'fnEstDetalle'])->name('Estudiante.xDetalle');

Route::get('/actualizar/{id}', [PagesController::class, 'fnEstActualizar'])->name('Estudiante.xActualizar');
Route::put('/actualizar/{id}', [PagesController::class, 'fnUpdate'])->name('Estudiante.xUpdate');

Route::delete('/eliminar/{id}', [PagesController::class, 'fnEliminar'])->name('Estudiante.xEliminar');





Route::post('/', [PagesController::class, 'fnRegistrar2'])->name('Estudiante.xRegistrar2');

Route::get('/Seguimiento', [PagesController::class, 'fnSeguimiento'])->name('xSeguimiento');
Route::get('/detalle/{id}', [PagesController::class, 'fnEstDetalle2'])->name('Seguimiento.xDetalle');

Route::get('/actualizar/{id}', [PagesController::class, 'fnEstActualizar2'])->name('Seguimiento.xActualizar');
Route::put('/actualizar/{id}', [PagesController::class, 'fnUpdate2'])->name('Seguimiento.xUpdate');

Route::delete('/eliminar/{id}', [PagesController::class, 'fnEliminar2'])->name('Seguimiento.xEliminar');




Route::get('/galeria/{numero?}', [PagesController::class, 'fnGaleria']) ->where('numero', '[0-9]+')-> name('xGaleria');
    





Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
