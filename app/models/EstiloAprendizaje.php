<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class EstiloAprendizaje extends Eloquent {


    public $table = 'estilos_aprendizaje';

    public function usuario(){
        $this->hasMany('Usuario');
    }

    public function objetoAprendizaje(){
        $this->hasMany('ObjetoAprendizaje');
    }


}
