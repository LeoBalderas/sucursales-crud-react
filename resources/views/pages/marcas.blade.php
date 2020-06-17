
{{-- Extensión del layout padre del sitio web --}}
@extends('layouts.app')

{{-- Aplicación de Yield --}}
@section('tituloPagina', 'Marcas - Visualizador de Automóviles')

{{-- Aplicación de Yield --}}
@section('contenidoPagina')


        <div class="jumbotron text-center">
            <!-- Title -->
            <h2 class=" card-title h2">Visualizador de Automóviles</h2>
            <!-- Subtitle -->
            <p class="blue-text my-4 font-weight-bold">Listado de Marcas Registradas</p>
        </div>

        @foreach ($marcas as $i => $marca)
          @if ($i%2 == 0)
            <div class="media d-block d-md-flex mt-4">
              <img class="d-flex mb-3 mx-auto media-image img-fluid" src="{{asset('img/marcas/'.$marca->imagene->Foto)}}"
                alt="Generic placeholder image">
              <div class="media-body text-center text-md-left ml-md-3 ml-0">
                <h5 class="mt-0 font-weight-bold">{{$marca->Nombre}}</h5>
                <small>País: {{$marca->País}}</small>
                <p>
                  {{$marca->DescripcionCorta}}
                </p>
                <a href="#"><i class="fas fa-angle-double-right"></i></a>
              </div>
              
            </div>
            <hr class="my-4">

          @else
            <div class="media d-block d-md-flex mt-4">
              <div class="media-body text-center text-md-left ml-md-3 ml-0">
                <h5 class="mt-0 font-weight-bold">{{$marca->Nombre}}</h5>
                <small>País: {{$marca->País}}</small>

                <p>
                  {{$marca->DescripcionCorta}}
                </p>
                <a href="#"><i class="fas fa-angle-double-right"></i></a>

              </div>
              <img class="d-flex mt-3 mx-auto media-image img-fluid" src="{{asset('img/marcas/'.$marca->imagene->Foto)}}"
                alt="Generic placeholder image">
            </div>
            <hr class="my-4">

          @endif
            
        @endforeach
     
        <br><br><br><br><br><br><br><br><br><br>

@endsection