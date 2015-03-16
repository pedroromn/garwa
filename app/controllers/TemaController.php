<?php

class TemaController extends BaseController {

 

   public function get_tema_id($id){

      // Mostrar información del tema

      // listar las lecciones relacionadas con este tema

        if(Auth::check()){


            $datos = DB::table('temas')
                     ->Join('lecciones', 'temas.id', '=', 'lecciones.tema_id')
                     ->where('temas.id', '=', $id)
                     ->get();

             if(empty($datos)){

                return Redirect::back()->with('mensaje_error', 'Esta tema no está habilitado');

             }else{

                //print_r($datos);

                    $usuario = Auth::user();
                    $tema = Tema::find($id);

                    return View::make('Tema.temaId', array('datos' => $datos, 'usuario' => $usuario, 'tema' => $tema));

             }        

      }

   }

   

}
