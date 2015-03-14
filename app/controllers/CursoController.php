<?php

class CursoController extends BaseController {

 
    public function get_cursos()
    {

        if(Auth::check()){


             $cursos = Curso::all();

             $usuario = Auth::user();

             return View::make('Curso.cursos', array('cursos' => $cursos, 'usuario' => $usuario));

        }else{

            return Redirect::to('login')
                            ->with('mensaje_error', 'Para acceder al contenido debes iniciar sesión');
        }

 
    }



   public function get_curso_id($id){

      // mostrar información del curso seleccionado por el id

      // listamos las unidades asociadas a este curso

   }

  

}