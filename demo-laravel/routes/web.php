<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientesController;
use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/{nombre}/{matricula}', 
    [HomeController::class, 'index'])->where('matricula', '[0-9]{4}[A-Z]{3}');

Route::get('/error-api', function () {
    // Procesar errores de API
    return view('error');
})->name('error.api');

Route::get('/error-default', function () {
    // Procesar errores de la aplicación
    return view('error');
})->name('error.default');

Route::get('/clientes', 
    [ClientesController::class, 'index'])->name('clientes.index');

Route::get('/clientes/{id}', 
    [ClientesController::class, 'show'])->name('clientes.show');

Route::post('/clientes/{id}', 
    [ClientesController::class, 'update'])->name('clientes.update');    
