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
                        <li><a href="#" class="active" title="perfil">{{ $usuario->nombre_usuario }} {{ $usuario->apellido_usuario }}</a></li>
                        <li><a href="{{ URL::to('logout') }}">Salir</a></li>
                    @endif
                  </ul>
                </nav>
          </div>

      </div>
</nav>

@stop


@section('contenido')


  <div class="jumbotron">
      <div class="container">
        <h1>Bienvenido </h1>
        <p>Una gran variedad de cursos disponibles te esperan. <br> Comienza a aprender</p>
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

      </div>  

      <div class="container">
        
        <br><br>

        @if(Session::has('mensaje_error'))
                            <div class="alert alert-danger">{{ Session::get('mensaje_error') }}</div>
                          @endif

      </div>

@stop







@section('footer')

<br><br><br><br><br><br>


    <div class="container">
        <footer class="footer">
        <p>&copy; GARWA 2015</p>
      </footer>
</div>


@stop
