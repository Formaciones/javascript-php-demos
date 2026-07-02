<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Exceptions\Renderer\Exception;
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
                ->with('mensaje', $e->message());
        }
    }

    public function show($id) {
        try {
            $response = $this->httpclient->get('customers/'. $id);
            $cliente = json_decode($response->getBody()->getContents(), true);

            return view('clientes.show', [ 'cliente' => $cliente ]);
        } catch (RequestException $e) {
            return redirect()
                ->route('error.api')
                ->with('mensaje', 'No se pudo recuperar el listado de clientes.')
                ->with('respuesta', $e->getResponse())
                ->with('codigo', $e->getCode());
        } catch (Exception $e) {
            return redirect()
                ->route('error.default')
                ->with('mensaje', $e->message());
        }        
    }   
    
    public function update(Request $request, string $id) {
        try {
            $datos = $request->validate([
                'customerID' => 'required|string|max:5',
                'companyName' => 'required|string',
                'contactName' => 'nullable|string',
                'contactTitle' => 'nullable|string',
                'address' => 'nullable|string',
                'city' => 'nullable|string',
                'region' => 'nullable|string',
                'postalCode' => 'nullable|string',
                'country' => 'nullable|string',
                'phone' => 'nullable|string',
                'fax' => 'nullable|string'
            ]);

            $dato2 = $request->all();
            $dato3 = $request->only(['customerID', 'companyName']);
            $datos4 = $request->companyName;

            $response = $this->httpclient->put('customers/'. $id, ['json' => [
                'customerID' => $id,
                'companyName' => $datos['companyName'],
                'contactName' => $datos['contactName'],
                'contactTitle' => $datos['contactTitle'],
                'address' => $datos['address'],
                'city' => $datos['city'],
                'region' => $datos['region'],
                'postalCode' => $datos['postalCode'],
                'country' => $datos['country'],
                'phone' => $datos['phone'],
                'fax' => $datos['fax']
            ]]);

            return redirect()
                ->route('clientes.show', $id)
                ->with('mensaje', 'Cliente ' . $datos['companyName'] . ' actualizado correctamente.');
        } catch (RequestException $e) {
            return redirect()
                ->route('error.api')
                ->with('mensaje', 'No se pudo actualizar el clientes.')
                ->with('codigo', $e->getCode());
        } 
    }
}
