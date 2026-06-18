<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index($nombre, $matricula) {
        return view('home', [
            'titulo' => 'Demostración de Laravel',
            'nombre' => $nombre,
            'matricula' => $matricula
        ]);
    }
}
