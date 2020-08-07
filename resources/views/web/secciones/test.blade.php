{{-- Extensión del layout padre del sitio web --}}
@extends('layouts.app')

{{-- Aplicación de Yield --}}
@section('tituloPagina', 'Autenticación')

{{-- Aplicación de Yield --}}
@section('contenidoPagina')
    <!-- Jumbotron -->
    <div class="jumbotron text-center">

    <!-- Title -->
    <h2 class="card-title h2">Acceso correcto</h2>

    <hr class="my-4">

    <p>Token</p>

  <!-- <div class="pt-2">
      <a href="/sucursales-crud-react/public/register" class="btn btn-blue waves-effect">REGISTRO<span class="fas fa-user ml-1"></span></a>
    </div> -->

    </div>
  <!-- Jumbotron -->
  <br><br><br><br><br><br><br><br><br><br>
  
@endsection