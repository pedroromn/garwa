<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class ObjetoAprendizaje extends Eloquent  {

    public static $table = 'objetos_aprendizaje';

    public function leccion(){
        return $this->belongsTo('Leccion', 'id_leccion');
    }

    public function estiloAprendizaje(){
        return $this->belongsTo('EstiloAprendizaje', 'id_estilo_aprendizaje');
    }    

   

}