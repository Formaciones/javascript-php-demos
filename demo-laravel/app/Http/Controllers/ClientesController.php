<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class ClientesController extends Controller
{
    private Client $httpclient;

    public function __construct()
    {
        $this->httpclient = new Client([
            'base_uri' => 'https://gesnorthwind.azurewebsites.net/',
            'time_out' => 15,
            'headers' => [
                'apikey' => '1234567890.',
                'Accept' => 'application/json',
                'Content-Type' => 'application/json'
            ]
        ]);
    }


    public function index() {
        $response = $this->httpclient->get('customers');
        $clientes = json_decode($response->getBody()->getContents(), true);

        return view('clientes.index', [ 'clientes' => $clientes ]);
    }

    public function show($id) {
        return view('clientes.show');
    }    
}
