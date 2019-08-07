<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
  //Funcion para poder hacer la definicion del modelo para la tabla users
  protected $table= 'users';
  protected $primaryKey='id';
  protected $fillable = [
        'idrol', 'nombre', 'telefono', 'email','usuario','password', 'condicion','apellido','cargo','pais','extension','idioma',
  ]; 
  //Funcion para declarar la relacion entre academias y usuarios por su modelo
  public function academias(){
     return $this->hasMany('App\Academias'); 
 }
}
