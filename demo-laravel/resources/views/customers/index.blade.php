@extends('layouts.app')

@section('titulo')
Northwind App | Listado de Clientes
@endsection

@section('titulo1')
Clientes desde MySQL
@endsection

@section('titulo2')
Listado de Clientes
@endsection


@section('contenido')
    <br />
    <div class="row">
        <div class="col-12">
            <table class="table table-stiped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Empresa</th>
                        <th>Contacto</th>
                        <th>Dirección</th>
                        <th>Teléfono</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clientes as $cliente)
                    <tr>
                        <td>{{$cliente['CustomerID']}}</td>
                        <td>{{$cliente['CompanyName']}}</td>
                        <td>
                            {{$cliente['ContactName']}}
                            <br /> 
                            <small>{{$cliente['ContactTitle']}}</small>
                        </td>
                        <td>
                            {{$cliente['Address']}}
                            <br /> 
                            <small>
                                {{$cliente['PostalCode']}} {{$cliente['City']}}
                                <br />
                                ({{$cliente['Country']}})
                            </small>
                        </td>                        
                        <td>{{$cliente['Phone']}}</td>
                        <td>
                            <a href="/customers/{{$cliente['CustomerID']}}" class="btn btn-link">Ficha</a>
                            &nbsp;
                            <a href="{{ route('customers.show',['id' => $cliente['CustomerID']]) }}" class="btn btn-link">Ficha</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
