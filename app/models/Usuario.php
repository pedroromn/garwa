<?php


use Illuminate\Database\Eloquent\SoftDeletingTrait;
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;



class Usuario extends Eloquent implements UserInterface , RemindableInterface{


	use SoftDeletingTrait, UserTrait, RemindableTrait;

	protected $table = 'usuarios';
	protected $hidden = array('password_usuario', 'remember_token');


    public static $errors;

    public function cursos(){
        return $this->belongsToMany('Curso', 'usuarios_cursos', 'id_usuario', 'id_curso');
    }
    public function estilo(){
        return $this->belongsTo('EstiloAprendizaje', 'id_estilo_aprendizaje');
    }

    public function getId(){
        return $this->id;
    }

    public static function valida_usuario($data){

        $rules = array(

                'nombre_usuario' => 'required',
                'apellido_usuario' => 'required',
                'nivel_secundaria_usuario' => 'required',
                'genero_usuario' => 'required',
                'fecha_nacimiento_usuario' => 'required',
                'email' => 'required|email',
                'password' => 'required'
            );

        $validator = Validator::make($data, $rules);

        if($validator->passes()){
            return true;
        }

        return false;

    }

    public static function crear_usuario_datos_personales($nombre, $apellido, $email, $password, 
        $nivel_secundaria, $fecha_nac, $genero){

        $usuario = new Usuario();

        $usuario->nombre_usuario = $nombre;
        $usuario->apellido_usuario = $apellido;
        $usuario->email = $email;
        $usuario->password = Hash::make($password);
        $usuario->nivel_secundaria_usuario = $nivel_secundaria;
        $usuario->rol_usuario = 1;
        $usuario->id_estilo_aprendizaje = 9;
        $usuario->estado_usuario = 2;
        $usuario->fecha_nacimiento_usuario = $fecha_nac;
        $usuario->genero_usuario = $genero;

        $usuario->save();

        if(isset($usuario)){

            return $usuario->id;

        }else{

            return null;

        }        

    }




}




