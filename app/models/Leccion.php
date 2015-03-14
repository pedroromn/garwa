<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Leccion extends Eloquent {


    public static $table = 'lecciones';

    public function tema(){
        return $this->belongsTo('Tema', 'tema_id');
    }

    public function objetoAprendizaje(){
        return $this->hasMany('ObjetoAprendizaje');
    }    


}