@extends('layouts.contenido')

@section('cabecera')
    <title>Login</title>

@stop


@section('intro')

<div class="container">
    <div class="header">
        <nav>
          <ul class="nav nav-pills pull-right">
            <li role="presentation" class="active"><a href="{{ URL::to('') }}">Inicio</a></li>
            <li role="presentation" ><a href="{{ URL::to('registro') }}">Registro</a></li>
          </ul>
        </nav>
        <h3 class="text-muted">GARWA</h3>
      </div>
</div>

@stop


@section('contenido')

<div class="container">

{{-- <div class="jumbotron">
        <h1>Login</h1>
      </div> --}}

      <!-- FORMULARIO DE LOGIN -->
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Iniciar Sesión</div>
                        <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Olvidaste tu password?</a></div>
                    </div>

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>








                        {{ Form::open( array('url' => 'login', 'method' => 'POST', 'role' => 'form'), array('id' => 'loginform', 'class' => 'form-horizontal')) }}


                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        {{ Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'test@example.com', 'required' => 'required']) }}
                                    </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-star"></i></span>
                                        {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'password', 'required' => 'required')) }}
                                    </div>






                            <div class="input-group">
                                      <div class="checkbox">
                                        <label>
                                          {{ Form::checkbox('remember', 1, null, ['id' => 'login-remember']) }} Recordarme
                                        </label>
                                      </div>
                                    </div>



                                <!-- BOTONES DE ENVÍO -->

                                <div style="margin-top:10px" class="form-group">

                                    <div class="col-sm-12 controls">
                                      {{ Form::submit('Login', array('class' => 'btn btn-success')) }}
                                      {{ Form::button('Facebook', array('class' => 'btn btn-primary')) }}
                                      {{ Form::button('Twitter', array('class' => 'btn btn-primary')) }}
                                    </div>

                                </div>


                                <div class="form-group">
                                    <div class="col-md-12 control">
                                        <div style="border-top: 1px ; padding-top:15px; font-size:85%" >
                                            Si no tienes una cuenta!
                                        <a href="{{ URL::to('registro') }}" >
                                            Regístrate Aquí
                                        </a>
                                        </div>
                                    </div>
                                </div>



                            <br><br><br><br>


                          @if(Session::has('mensaje_error'))
                            <div class="alert alert-danger">{{ Session::get('mensaje_error') }}</div>
                          @endif

                          @if(Session::has('mensaje'))
                            <div class="alert alert-success">{{ Session::get('mensaje') }}</div>
                          @endif



                          {{ Form::close() }}












                        </div>
                    </div>
        </div>

  </div> <!-- DIV CLASS="CONTAINER" -->
@stop



@section('alert')

<div class="container">
    <div>
         <div   style="display: none;" id="login-error" class="alert alert-danger mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2"></div>
            </div>
</div>



@stop



@section('footer')

<br>
<br>
<br>
<br>
<br>
<br>

    <div class="container">
        <footer class="footer">
        <p>&copy; GARWA 2015</p>
      </footer>
</div>
@stop
