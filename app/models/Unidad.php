<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Unidad extends Eloquent {


    public $table = 'unidades';

    public function curso(){
        return $this->belongsTo('Curso', 'curso_id');
    }

    public function temas(){
        return $this->hasMany('Tema');
    }    



}