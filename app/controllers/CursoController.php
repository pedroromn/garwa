<?php

class CursoController extends BaseController {

 
    public function get_cursos()
    {

        $cursos = Curso::all();

        return View::make('Curso.cursos', array('cursos' => $cursos));
    }



   public function get_curso_id($id){

      // mostrar información del curso seleccionado por el id

      // listamos las unidades asociadas a este curso

   }

  

}