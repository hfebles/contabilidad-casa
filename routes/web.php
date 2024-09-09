<?php

use App\Http\Controllers\{InventarioController, ComprasController};
use Illuminate\Support\Facades\Route;



Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/inventario', InventarioController::class);
Route::resource('/compras', ComprasController::class);

Route::get('/lista', [ComprasController::class, 'listaIndex'])->name('lista.index');
Route::get('/lista/create', [ComprasController::class, 'listaCreate'])->name('lista.create');
Route::post('/lista/store-lista', [ComprasController::class, 'listaStore'])->name('lista.store');
