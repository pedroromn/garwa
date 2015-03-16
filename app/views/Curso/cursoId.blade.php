@extends('layouts.contenido')

@section('cabecera')
    <title>Curso {{ $curso->id }}: {{ $curso->nombre_curso }}</title>

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
        <h1>{{ $curso->nombre_curso }}</h1>
        <p>{{ $curso->descripcion_curso }}</p>
        <p><a style="font-size: 15px" class="btn-default" rol="button" href="{{ URL::to('cursos') }}" >&laquo; Volver a cursos</a></p>
      </div>
    </div>

     <!-- Main jumbotron for a primary marketing message or call to action -->

    <div class="container">
      <!-- Example row of columns -->

      <div class="row">

        @foreach($datos as $key => $value)

            <div class="col-md-4">
              <h2>{{ $value->nombre_unidad  }}</h2>
              <p>{{ $value->descripcion_unidad }}</p>
              <p><a class="btn btn-default" href="/unidad/{{ $value->id }}" role="button">Ver unidad &raquo;</a></p>
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