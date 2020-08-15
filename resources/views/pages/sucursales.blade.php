{{-- Extensión del layout padre del sitio web --}}
@extends('layouts.app')

{{-- Aplicación de Yield --}}
@section('tituloPagina', 'Gestor Sucursales - Visualizador de Sucursales')

{{-- Aplicación de Yield --}}

@section('contenidoPagina')

    <div>
        {{-- <input id="token" type="hidden" value="{{ $token }}"> --}}
    </div>

    <div id="sucursales"></div>
    
@stop