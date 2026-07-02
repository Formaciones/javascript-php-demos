<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Foundation\Exceptions\Renderer\Exception;

class CustomerController extends Controller
{
    public function index()
    {
        $clientes = Customer::orderBy('CompanyName')->get();
        return view('customers.index', [ 'clientes' => $clientes ]);
    }

    public function show(string $id)
    {
        $cliente = Customer::findOrFail($id);
        return view('customers.show', [ 'cliente' => $cliente ]);
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

            $filas = Customer::where('CustomerID', $id)->update([
                'CompanyName' => $datos['companyName'],
                'ContactName' => $datos['contactName'],
                'ContactTitle' => $datos['contactTitle'],
                'Address' => $datos['address'],
                'City' => $datos['city'],
                'Region' => $datos['region'],
                'PostalCode' => $datos['postalCode'],
                'Country' => $datos['country'],
                'Phone' => $datos['phone'],
                'Fax' => $datos['fax']
            ]);

            if($filas == 0) {
                return redirect()
                ->route('customers.show', $id)
                ->with('mensaje', 'Cliente ' . $datos['companyName'] . ' NO se actualizado correctamente.');
            }


            return redirect()
                ->route('customers.show', $id)
                ->with('mensaje', 'Cliente ' . $datos['companyName'] . ' actualizado correctamente.');
        } catch (Exception $e) {
            return redirect()
                ->route('error.api')
                ->with('mensaje', 'No se pudo actualizar el clientes.');
        } 
    }

}
