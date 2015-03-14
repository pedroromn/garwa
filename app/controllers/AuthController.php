<?php

class AuthController extends BaseController {




    public function get_login()
    {

        if (Auth::check())
        {
            return Redirect::to('/cursos');
        }

        return View::make('Auth.login');
    }


    public function post_login(){

            //return Input::all();
        $rules = array(
            'email' => 'required',
            'password' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('login')
                            ->with('mensaje_error', 'Datos no válidos')
                            ->withInput();
        } else {

            $data = array(
                'email' => Input::get('email'),
                'password' => Input::get('password')
            );

            if (Auth::attempt($data))
            {
                return Redirect::to('cursos');
            }
            return Redirect::to('login')
                            ->with('mensaje_error', 'Tus datos son incorrectos')
                             ->withInput(Input::except('password_field'));
        }

    }


    public function get_logout(){
        Auth::logout();
        return Redirect::to('login')->with('mensaje', 'Su sessión ha finalizado!');
    }




    public function get_registro_datos()
    {
        return View::make('Auth.registro');
    }


   

    public function post_registro_datos_personales(){


        $data = array(

            'nombre_usuario' => Input::get('nombre'),
            'apellido_usuario' => Input::get('apellido'),
            'nivel_secundaria_usuario' => Input::get('nivel_secundaria') + 1, 
            'genero_usuario' => Input::get('genero') + 1,
            'fecha_nacimiento_usuario' => Input::get('fecha_nac'),
            'email' => Input::get('email'),
            'password' => Input::get('password')
        );

        //print_r($data);

        if(Usuario::valida_usuario($data)){


            $id_usuario = Usuario::crear_usuario_datos_personales($data['nombre_usuario'], $data['apellido_usuario'], 
                $data['email'], $data['password'], $data['nivel_secundaria_usuario'], $data['fecha_nacimiento_usuario'], 
                $data['genero_usuario']);


            if($id_usuario != null){

                //return Redirect::to('test', array('id_usuario' => $id_usuario));

                return Redirect::action('AuthController@get_test_felder', ['id_usuario' => $id_usuario]);

            }else{

                return Redirect::to('registro')
                            ->with('mensaje_error', 'Creación del usuario fallida');

            }

        }else{

            return Redirect::to('registro')
                            ->with('mensaje_error', 'Tus datos son incorrectos');

        }


        
    }



     public function get_test_felder($id_usuario)
    {

        $test = Test::all();

        $usuario = Usuario::find($id_usuario);


        return View::make('Auth.test', array('test' => $test, 'usuario' => $usuario));
    }



    public function post_completar_registro(){


        // Salvar estilo aprendizaje y poner activo al usuario

        return Redirect::to('login');
    }


}
