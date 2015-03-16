<?php

class UnidadController extends BaseController {

 
   public function get_unidad_id($id){

        // Mostrar información de la unidad seleccionada

        // listar los temas asociados a esta unidad 

        if(Auth::check()){


            $datos = DB::table('unidades')
                     ->Join('temas', 'unidades.id', '=', 'temas.unidad_id')
                     ->where('unidades.id', '=', $id)
                     ->get();

         if(empty($datos)){

            return Redirect::back()->with('mensaje_error', 'Esta unidad no está habilitada');

         }else{

            //print_r($datos);

          $usuario = Auth::user();
          $unidad = Unidad::find($id);

          return View::make('Unidad.unidadId', array('datos' => $datos, 'usuario' => $usuario, 'unidad' => $unidad));

         }        

      }

      
   }


}
