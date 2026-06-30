@extends('layouts.app')

@section('titulo')
Northwind App | Listado de Clientes
@endsection

@section('titulo1')
Clientes
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
                        <td>{{$cliente['customerID']}}</td>
                        <td>{{$cliente['companyName']}}</td>
                        <td>
                            {{$cliente['contactName']}}
                            <br /> 
                            <small>{{$cliente['contactTitle']}}</small>
                        </td>
                        <td>
                            {{$cliente['address']}}
                            <br /> 
                            <small>
                                {{$cliente['postalCode']}} {{$cliente['city']}}
                                <br />
                                ({{$cliente['country']}})
                            </small>
                        </td>                        
                        <td>{{$cliente['phone']}}</td>
                        <td>
                            <a href="/clientes/{{$cliente['customerID']}}" class="btn btn-link">Ficha</a>
                            &nbsp;
                            <a href="{{ route('clientes.show',['id' => $cliente['customerID']]) }}" class="btn btn-link">Ficha</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
