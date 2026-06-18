<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/{nombre}/{matricula}', [HomeController::class, 'index'])->where('matricula', '[0-9]{4}[A-Z]{3}');
