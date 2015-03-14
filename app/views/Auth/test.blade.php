@extends('layouts.contenido')

@section('cabecera')
    <title>Test de Felder</title>

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


<h2>ESTILOS DE APRENDIZAJE DE FELDER (ILS)</h2>
    <p class="lead">
        Instrucciones
    </p>
    
    <div class="alert alert-info">

        <ul>
            <li><p>Seleccione la opción "a" o "b" para indicar su respuesta a cada pregunta. Solo puede seleccionar una respuesta.</p></li>
            <li><p>Si tanto "a" y "b" parecen aplicarse a usted, seleccione aquella que se aplique con mayor frecuencia.</p></li>
            <li>{{ $usuario->nombre_usuario }}</li>
        </ul>

    </div>

  </div> <!-- DIV CLASS="CONTAINER" --> 




<!-- TABLA CON PREGUNTAS DEL TEST -->

  <div class="container">

        <div class="row">
        
        
        <div class="col-md-12">
        <h4>Cuestionario</h4>
        <div class="table-responsive">




           
      <table id="test" class="table table-bordred table-striped">
                   
           <thead>
               <th>No</th>
               <th>Pregunta</th>
               <th>Opción A</th>
               <th>Opción B</th>
               <th></th>
           </thead>


        <tbody>
        
        @foreach ($test as $value)

            <tr>
                <td>{{ $value['id_test'] }}</td>
                
                <td>{{ $value['pregunta'] }}</td>

                <td> <input categoria="{{ $value['categoria_a'] }}" id="a{{$value['id_test']}}" type="checkbox" class="checkthis" />  {{ $value['respuesta_a'] }} </td>

                <td> <input  categoria="{{ $value['categoria_b'] }}" id="b{{$value['id_test']}}" type="checkbox" class="checkthis" /> {{ $value['respuesta_b'] }} </td>

                <td> <div name="pregunta_{{$value['id_test']}}" type="hidden" >
                  
                </div> </td>
            </tr>

        @endforeach    


        
        </tbody>
            
      </table>


     
            
            <div class="form-group col-lg-6">
                    <button id="evaluar_test"  class="btn btn-success" value="">Evaluar Test</button>
                </div>


                
            </div>
            
        </div>
    </div>



    <div id="modal_form" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Finalizando Registro</h4>
          </div>
          <div class="modal-body">

                <p>Tu registro en el sistema está completado, puedes seguir y comenzar a disfrutar del contenido</p>

                {{ Form::open(array('action' => 'AuthController@post_completar_registro', 'method' => 'POST'), array('role' => 'form')) }}
                  {{ Form::hidden('estilo_aprendizaje_usuario', null, ['id' => 'estilo']) }}
                  {{ Form::submit('Seguir', array('class' => 'btn btn-primary')) }}
                {{ Form::close() }}

          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->




    <div id="modal_alerta" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Alerta!!</h4>
          </div>
          <div class="modal-body">
              <p>El cuestionario ha sido mal diligenciado, vuelve a intentarlo!!</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->





      
  </div>

<!-- FIN TABLA CON PREGUNTAS DEL TEST -->


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


@section('scripts')
 {{ HTML::script('js/evaluar_estilo_aprendizaje.js') }} 
@stop