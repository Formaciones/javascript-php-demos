@extends('layouts.app')

@section('titulo')
Northwind App | Errores
@endsection

@section('titulo1')
Errores
@endsection

@section('titulo2')
Información del Error
@endsection


@section('contenido')
    @if (session('mensaje'))
    <div class="alert alert-danger">
        {{session('mensaje')}}
        <br /><br />
        <b>Código:</b> {{session('codigo')}}<br />
    </div>
    @else
    <div class="alert alert-danger">
        Se ha producido un error en la aplicación.
    </div>
    @endif 
    <br /><br /><br /><br />
@endsection