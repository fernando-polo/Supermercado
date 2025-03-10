<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TiendaController;
use App\Http\Controllers\PerfilController;


// Ruta para actualizar una dirección
Route::put('/perfil/direcciones/{id}', [PerfilController::class, 'editarDireccion'])->name('perfil.direcciones.editar');

Route::get('/perfil', [PerfilController::class, 'index'])->name('perfil.index');
Route::get('/perfil/historial', [PerfilController::class, 'historial'])->name('perfil.historial');
Route::get('/perfil/direcciones', [PerfilController::class, 'obtenerDirecciones'])->name('perfil.direcciones');
Route::post('/perfil/direcciones/agregar', [PerfilController::class, 'agregarDireccion'])->name('perfil.direcciones.agregar'); // Verifica que esta ruta esté definida
Route::get('/perfil/direcciones/eliminar/{id}', [PerfilController::class, 'eliminarDireccion'])->name('perfil.direcciones.eliminar');


Route::get('/perfil', [PerfilController::class, 'index'])->name('perfil'); // Vista de perfil
Route::get('/perfil/historial', [PerfilController::class, 'historial'])->name('perfil.historial'); // Vista historial de compras

Route::get('/', [TiendaController::class, 'index'])->name('tienda.index');
Route::get('/carrito', [TiendaController::class, 'verCarrito'])->name('tienda.carrito');


Route::get('/', [TiendaController::class, 'index'])->name('tienda.index');

/* Route::get('/perfil', function () {
    return view('perfil');
})->name('perfil'); */

