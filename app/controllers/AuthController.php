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

            echo $data['email'] .'<br>';

            $query = DB::table('usuarios')->select('id')
                                ->where('email', '=', $data['email'])
                                ->where('estado_usuario', '=', 'INACTIVO')
                                ->get();

                                //print_r($query[0]->id);
            

            if(!empty($query)){

                                $id = $query[0]->id;

                return Redirect::to('test/'.$id)
                            ->with('mensaje_error', 'Debes completar tu registro, realizando el test de Felder');


            }else{

                if (Auth::attempt($data))
                {
                    return Redirect::to('cursos');
                }
                return Redirect::to('login')
                            ->with('mensaje_error', 'Tus datos son incorrectos'); 
            }        

            
        }

    }


    public function get_logout(){
        Auth::logout();
        return Redirect::to('login')->with('mensaje', 'Su sesión ha finalizado!');
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


            $user = DB::table('usuarios')
                    ->where('email', '=', $data['email'])
                    ->get(); 
                    

            if(!empty($user)){


                return Redirect::to('registro_datos')
                            ->with('mensaje_error', 'Ya existe un usuario con ese email');

            }else{
                    

                $id_usuario = Usuario::crear_usuario_datos_personales($data['nombre_usuario'], $data['apellido_usuario'], 
                $data['email'], $data['password'], $data['nivel_secundaria_usuario'], $data['fecha_nacimiento_usuario'], 
                $data['genero_usuario']);


                if($id_usuario != null){

                    //return Redirect::to('test', array('id_usuario' => $id_usuario));

                    return Redirect::action('AuthController@get_test_felder', ['id_usuario' => $id_usuario]);


                }else{

                    return Redirect::to('registro_datos')
                                ->with('mensaje_error', 'Creación del usuario fallida');

                }       

            }        

        }else{

            return Redirect::to('registro_datos')
                            ->with('mensaje_error', 'Tus datos son incorrectos');

        }


        
    }



     public function get_test_felder($id_usuario)
    {

        $usuario = Usuario::find($id_usuario);
        
        if(empty($usuario)){

            return Redirect::to('registro_datos')
                                ->with('mensaje_error', 'Tu usuario no existe, regístrate');

        }else{

            $estado = $usuario->estado_usuario;

            if($estado == 2){

                return View::make('Auth.test', array('test' => $test, 'usuario' => $usuario));

            }else{


                return Redirect::to('login')
                                ->with('mensaje_error', 'No necesitas repetir el test de Felder');

            }

        }            

        



        // $test = Test::all();

        // $usuario = Usuario::find($id_usuario);

        // if(emp($usuario)){

        //     return View::make('Auth.test', array('test' => $test, 'usuario' => $usuario));

        // }else{

        //     echo "Sitio no existente";

        // }


        
    }

    



    public function post_completar_registro(){


        $id_estilo_aprendizaje = Input::get('estilo_aprendizaje_usuario');
        $id_usuario = Input::get('id_usuario');


        if(Usuario::actualizar_usuario_test($id_usuario, $id_estilo_aprendizaje)){

            return Redirect::to('login')->with('mensaje', 'Has completado tu registro, puedes iniciar sesión!');

        }else{

            return Redirect::to('registro_datos')->with('mensaje_error', 'No has iniciado tu registro!');

        }

        
    }


}
