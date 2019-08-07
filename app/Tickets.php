<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
  //Funcion para poder hacer la definicion del modelo para la tabla tickets
  protected $table= 'tickets';
  protected $primaryKey='id';
  protected $fillable = [
        'id_usuario1', 'id_usuario2', 'asunto','fecha','nuevo','condicion'
  ];
  //Funcion para declarar la relacion entre mensajes y tickets por su modelo
  public function mensajes(){
       return $this->hasMany('App\Mensajes');
  }
  //Funcion para declarar la relacion entre users y tickets por su modelo
  public function users()
    {
        return $this->belongsTo('App\Usuarios');
    }
}
