<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Curso extends Eloquent {


    public $table = 'cursos';

    public function usuario(){
        return $this->belongsToMany('Usuario', 'usuarios_cursos', 'id_usuario', 'id_curso');
    }

    public function unidades(){
        return $this->hasMany('Unidad');
    }
   
}   
