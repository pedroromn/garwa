@extends('layouts.contenido')

@section('cabecera')
    <title>Cursos</title>

@stop


@section('intro')

<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">

        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">GARWA</a>
        </div>

        <div class="header">
                <nav>
                  <ul class="nav nav-pills pull-right">

                   @if (Auth::check())

                        <li><a href="{{ URL::to('logout') }}">Cerrar sesion</a></li>
                    @else
                        <li role="presentation" ><a href="{{ URL::to('login') }}">Login</a></li>
                    @endif

                    <li role="presentation" class=""><a href="{{ URL::to('') }}">Inicio</a></li>
                  </ul>
                </nav>
          </div>

      </div>
</nav>

@stop


@section('contenido')


  <div class="jumbotron">
      <div class="container">
        <h1>Bienvenido [Nombre Estudiante] </h1>
        <p>En esta sección encontrarás el listado de cursos disponibles</p>
      </div>
    </div>

     <!-- Main jumbotron for a primary marketing message or call to action -->

    <div class="container">
      <!-- Example row of columns -->

      <div class="row">

        @foreach($cursos as $value)

            <div class="col-md-4">
              <h2>{{ $value['nombre_curso'] }}</h2>
              <p>{{ $value['descripcion_curso'] }}</p>
              <p><a class="btn btn-default" href="cursos/{{ $value['id'] }}" role="button">Ver curso &raquo;</a></p>
            </div>

        @endforeach

      <hr>

@stop







@section('footer')

<br><br><br><br><br><br>
<br><br><br><br><br><br>
<br><br><br><br><br><br>


    <div class="container">
        <footer class="footer">
        <p>&copy; GARWA 2015</p>
      </footer>
</div>


@stop
