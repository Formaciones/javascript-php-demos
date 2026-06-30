@extends('layouts.app')

@section('titulo')
Northwind App | Home
@endsection

@section('titulo1')
Home
@endsection

@section('titulo2')
&nbsp;
@endsection

@php
    $html = '<script>alert("codigo malo");</script>';
@endphp


@section('contenido')
    <br />
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <h1>Hola Laravel ...</h1>
            <hr />
            <p><b>Nombre:</b> {{ $nombre }}</p>
            <p><b>Matricula:</b> {{ $matricula }}</p>
        </div>
        <div class="col-1"></div>
    </div>
    <br />
    <br />    


@endsection