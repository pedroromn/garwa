<?php

class LeccionController extends BaseController {


   public function get_leccion_id($id){

      // con el id_leccion y el id_usuario extrayendo el estilo de aprendizaje

      // mostramos el objeto de aprendizaje correspondiente a esta lección


        if(Auth::check()){


            $usuario = Auth::user();

            $id_estilo = $usuario->id_estilo_aprendizaje;

            if(isset($id_estilo)){

                    $objeto = DB::table('objetos_aprendizaje')
                     ->where('id_leccion', '=', $id)
                     ->where('id_estilo_aprendizaje', '=', $id_estilo)
                     ->get();

            }
   

             if(empty($objeto)){

                return Redirect::back()->with('mensaje_error', 'Esta lección no está habilitada');

             }else{

                    $leccion = Leccion::find($id);

                    return View::make('Leccion.leccionId', array('usuario' => $usuario, 'leccion' => $leccion, 'objeto_aprendizaje' => $objeto));

             }        

      }



   }

   
}
