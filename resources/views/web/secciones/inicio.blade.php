{{-- Extensión del layout padre del sitio web --}}
@extends('layouts.app')

{{-- Aplicación de Yield --}}
@section('tituloPagina', 'Inicio - Visualizador de Automóviles')

{{-- Aplicación de Yield --}}
@section('contenidoPagina')
    <!-- Jumbotron -->
    <div class="jumbotron text-center">

    <!-- Title -->
    <h2 class="card-title h2">Visualizador de Automóviles y Gestor de Sucursales</h2>
    <!-- Subtitle -->
    <h5 class="blue-text my-4 font-weight-bold">
    Actualizado para gestionar las sucursales mediante un CRUD con React JS
    </h5>
  
    <!-- Grid row -->
    <div class="row d-flex justify-content-center">
  
      <!-- Grid column -->
      <div class="col-xl-7 pb-2">
  
        <p class="card-text">
            Si deseas ver el catálogo de automóviles, da click en el botón "MARCAS".
            <br>
            <b>Si deseas acceder al gestor de sucursales, da click en el botón "SUCURSALES"</b>
        </p>
  
      </div>
      <!-- Grid column -->
  
    </div>
    <!-- Grid row -->
  
    <hr class="my-4">
  
    <div class="pt-2">
      <a href="/sucursales-crud-react/public/marcas" class="btn btn-cyan waves-effect">Marcas <span class="fas fa-car ml-1"></span></a>
    </div>
    <div class="pt-2">
      <a href="/sucursales-crud-react/public/gestor/sucursales" class="btn btn-dark waves-effect">Sucursales <span class="fas fa-building ml-1"></span></a>
    </div>
  
  </div>
  <!-- Jumbotron -->
  <br><br><br><br><br><br><br><br><br><br>
@endsection

