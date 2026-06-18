<?php

use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/{nombre}/{matricula}', function ($nombre, $matricula) {        
    return view('home', [
        'titulo' => 'Demostración de Laravel',
        'nombre' => $nombre,
        'matricula' => $matricula
    ]);
})->where('matricula', '[0-9]{4}[A-Z]{3}');
