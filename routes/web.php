<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;

Route::resource('productos', ProductoController::class);
Route::view('/create', 'create')->name('rutacreate');
Route::view('/edit', 'edit')->name('rutaedit');
Route::get('/', function () {
    return view('welcome');
});
