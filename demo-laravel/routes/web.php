<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientesController;
use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/{nombre}/{matricula}', 
    [HomeController::class, 'index'])->where('matricula', '[0-9]{4}[A-Z]{3}');

Route::get('/clientes', 
    [ClientesController::class, 'index']);

Route::get('/clientes/{id}', 
    [ClientesController::class, 'show']);
