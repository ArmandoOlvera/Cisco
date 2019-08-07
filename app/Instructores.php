<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instructores extends Model
{
   //Funcion para poder hacer la definicion del modelo para la tabla instructor
  protected $table= 'instructor';
  protected $primaryKey='id';
  protected $fillable = [
        'id_academia', 'nombre', 'telefono', 'email','apellido','condicion',
  ];
  //Funcion para declarar la relacion entre instructores y academias por su modelo
   public function academias(){
    return $this->belongsTo('App\Academias');
  }
}
