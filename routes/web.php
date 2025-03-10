<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerfilController;

Route::get('/perfil', [PerfilController::class, 'perfil'])->name('perfil');
Route::get('/historial-compras', [PerfilController::class, 'historial'])->name('historial');
Route::get('/pedido/{id}', [PerfilController::class, 'detallePedido'])->name('pedido.detalle');


Route::get('/', function () {
    return view('welcome');
});