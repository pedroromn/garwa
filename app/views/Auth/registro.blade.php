@extends('layouts.contenido')

@section('cabecera')
    <title>Registro</title>

@stop


@section('intro')

<div class="container">
    <div class="header">
        <nav>
          <ul class="nav nav-pills pull-right">
            <li role="presentation" class="active"><a href="{{ URL::to('') }}">Inicio</a></li>
            <li role="presentation" ><a href="{{ URL::to('login') }}">Login</a></li>
          </ul>
        </nav>
        <h3 class="text-muted">GARWA</h3>
      </div>
</div>

@stop


@section('contenido')

<div class="container">



<div class="container-page">




{{ Form::open( array('action' => 'AuthController@post_registro_datos_personales', 'method' => 'POST', 'role' => 'form')) }}

            <div class="col-md-6">
                
                <h3 class="dark-grey">Datos Personales</h3>
 
                <div class="form-group col-lg-6">
                    {{ Form::label('nombre', 'Nombre') }}
                    {{ Form::text('nombre', '', array('class' => 'form-control', 'required' => 'required')) }}
                </div>

                <div class="form-group col-lg-6">
                    {{ Form::label('apellido', 'Apellido') }}
                    {{ Form::text('apellido', '', array('class' => 'form-control', 'required' => 'required')) }}
                </div>
                

                <div class="form-group col-lg-6">
                    {{ Form::label('nivel_secundaria', 'Grado Ac.') }}
                    {{ Form::select('nivel_secundaria', ['SEXTO', 'SEPTIMO', 'OCTAVO', 'NOVENO', 'DECIMO', 'UNDECIMO'], null, ['class' => 'form-control', 'required' => 'required']) }}
                </div>


                <div class="form-group col-lg-6">
                    {{ Form::label('genero', 'Género') }}
                    {{ Form::select('genero', ['MASCULINO', 'FEMENINO'], null, ['class' => 'form-control', 'required' => 'required']) }}
                </div>

                <div class="form-group col-lg-8">
                    {{ Form::label('fecha_nac', 'Fecha de Nacimiento') }}
                    {{ Form::input('date', 'fecha_nac', null, ['class' => 'form-control', 'required' => 'required']) }}
                </div>



                <!-- INPUT OCULTO REPRESENTANDO EL CAMPO ROL CON VALOR 1 QUE CORRESPONDE A ESTUDIANTE -->



            </div>

        
            <div class="col-md-6">
                
                <h3 class="dark-grey">Información de Usuario</h3>
                
                <div class="form-group col-lg-12">
                    {{ Form::label('email', 'Email') }}
                   {{ Form::email('email', '', ['class' => 'form-control', 'required' => 'required']) }}
                </div>


                <div class="form-group col-lg-12">
                    {{ Form::label('password', 'Password') }}
                    {{ Form::password('password', ['class' => 'form-control', 'required' => 'required']) }}
                </div>

                <div class="form-group col-lg-6">
                    {{ Form::submit('Enviar', array('class' => 'btn btn-primary')) }}
                </div>

            </div>



{{ Form::close() }}

</div>





                       
  </div> <!-- DIV CLASS="CONTAINER" --> 



<div class="container">
@if(Session::has('mensaje_error'))
                            <div class="alert alert-danger">{{ Session::get('mensaje_error') }}</div>
                          @endif
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
