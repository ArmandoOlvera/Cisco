<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Usuarios;
class Academias extends Model
{
    //
   protected $table= 'academia';
  protected $primaryKey='id';
  protected $filltable=[
   'id_usuario','nombre','direccion','direccion2','pais','estado','ciudad','url','institucion','codigo','condicion',
  ];
  
  public function users(){
    return $this->belongsTo('App\Usuarios');
  }
}
