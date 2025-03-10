<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\PerfilController;

use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/carrito', [HomeController::class, 'carrito'])->name('carrito');
Route::get('/buscar', [HomeController::class, 'buscar'])->name('buscar');


Route::get('/perfil', [PerfilController::class, 'perfil'])->name('perfil');
Route::get('/historial-compras', [PerfilController::class, 'historial'])->name('historial');
Route::get('/pedido/{id}', [PerfilController::class, 'detallePedido'])->name('pedido.detalle');
