<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Usuarios;
class Academias extends Model
{
    //Funcion para poder hacer la definicion del modelo para la tabla academia
    protected $table= 'academia';
    protected $primaryKey='id';
    protected $filltable=[
     'id_usuario','nombre','direccion','direccion2','pais','estado','ciudad','url','institucion','codigo','condicion',
    ];
    //Funcion para declarar la relacion entre usuarios y academias
    public function users(){
      return $this->belongsTo('App\Usuarios');
    }
}
