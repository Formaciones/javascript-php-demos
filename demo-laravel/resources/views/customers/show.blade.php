@extends('layouts.app')

@section('titulo')
Northwind App | Ficha {{$cliente['companyName']}}
@endsection

@section('titulo1')
Clientes desde MySQL
@endsection

@section('titulo2')
Ficha {{$cliente['companyName']}}
@endsection

@section('contenido')
    @if (session('mensaje'))
    <br />
    <div class="alert alert-success">
        {{session('mensaje')}}
    </div>
    @endif 
    <br />
    <div class="row">
        <div class="col-12">
            <form method="post" action="/customers/{{$cliente['CustomerID']}}">

                @csrf

                <div class="row mb-3">
                    <label for="customerID" class="col-md-3 col-form-label text-end"><b>Identificador</b></label>
                    <div class="col-md-9">
                            <input type="text" class="form-control" id="customerID" name="customerID" value="{{$cliente['CustomerID']}}" />
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="companyName" class="col-md-3 col-form-label text-end"><b>Empresa</b></label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="companyName" name="companyName" value="{{$cliente['CompanyName']}}" />
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="contactName" class="col-md-3 col-form-label text-end"><b>Responsable</b></label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="contactName" name="contactName" value="{{$cliente['ContactName']}}" />
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="contactTitle" class="col-md-3 col-form-label text-end"><b>Cargo</b></label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="contactTitle" name="contactTitle" value="{{$cliente['ContactTitle']}}" />
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="address" class="col-md-3 col-form-label text-end"><b>Dirección</b></label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="address" name="address" value="{{$cliente['Address']}}" />
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="postalCode" class="col-md-3 col-form-label text-end"><b>Código Postal</b></label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="postalCode" name="postalCode" value="{{$cliente['PostalCode']}}" />
                    </div>
                </div>                

                <div class="row mb-3">
                    <label for="city" class="col-md-3 col-form-label text-end"><b>Ciudad</b></label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="city" name="city" value="{{$cliente['City']}}" />
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="region" class="col-md-3 col-form-label text-end"><b>Region</b></label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="region" name="region" value="{{$cliente['Region']}}" />
                    </div>
                </div>                

                <div class="row mb-3">
                    <label for="country" class="col-md-3 col-form-label text-end"><b>País</b></label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="country" name="country" value="{{$cliente['Country']}}" />
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="phone" class="col-md-3 col-form-label text-end"><b>Teléfono</b></label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="phone" name="phone" value="{{$cliente['Phone']}}" />
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="fax" class="col-md-3 col-form-label text-end"><b>Fax</b></label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="fax" name="fax" value="{{$cliente['Fax']}}" />
                    </div>
                </div>
                
                <br />

                <div class="row">
                    <div class="col-md-9 offset-md-3">
                        <div class="row">
                            <div class="col-6">
                                <a href="/customers" class="btn btn-outline-success">
                                    Volver al Listado de Clientes
                                </a>
                            </div>
                            <div class="col-6 text-end">
                                <button type="submit" class="btn btn-success">
                                    Guardar
                                </button>
                                <button type="reset" class="btn btn-secondary">
                                    Limpiar
                                </button>                                              
                            </div>
                        </div>
                    </div>                                                                        
                </div>

            </form>
        </div>
    </div>
@endsection
