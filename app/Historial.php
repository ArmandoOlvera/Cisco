<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
   //Funcion para poder hacer la definicion del modelo para la tabla historial
  protected $table= 'historial';
  protected $primaryKey='id';
  protected $fillable = [
      'id_academia', 'id_instructor' ,'status', 'fecha_inicio', 'id_materia', 'fecha_oc', 'condicion', 'hora_preferida', 'id_grupo',
  ];
  //Funcion para hacer la referencia de la tabla de resultados a la tabla de academias por su modelo
  public function academia(){
    return $this->belongsTo('App\Academias');
  }
  //FUncion para hacer la referencia de la tabla de resultados a la tabla de instructores por su modelo
  public function instructor(){
    return $this->belongsTo('App\Instructores');
  }
  
}
