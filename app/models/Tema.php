<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Tema extends Eloquent {


    public $table = 'temas';

    public function unidad(){
        return $this->belongsTo('Unidad', 'unidad_id');
    }

    public function lecciones(){
        return $this->hasMany('Leccion');
    }    


}