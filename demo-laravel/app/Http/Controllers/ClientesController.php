<?php

namespace App\Http\Controllers;

use Exception;
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
        try {
            $response = $this->httpclient->get('customers');
            $clientes = json_decode($response->getBody()->getContents(), true);

            // $a = 10;
            // $b = 0;
            // $c = $a / $b;

            return view('clientes.index', [ 'clientes' => $clientes ]);
        } catch (RequestException $e) {
            return redirect()
                ->route('error.api')
                ->with('mensaje', 'No se pudo recuperar el listado de clientes.')
                ->with('respuesta', $e->getResponse())
                ->with('codigo', $e->getCode());
        } catch (Exception $e) {
            return redirect()
                ->route('error.default')
                ->with('mensaje', $e->getMessage());
        }
    }

    public function show($id) {
        return view('clientes.show');
    }    
}
