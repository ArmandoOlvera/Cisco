<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupos extends Model
{
   //Funcion para poder hacer la definicion del modelo para la tabla grupos
  protected $table= 'grupos';
  protected $primaryKey='id';
  protected $fillable = [
        'nombre', 'descripcion', 'condicion',
  ]; 
}
