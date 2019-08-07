<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materias extends Model
{
   //Funcion para poder hacer la definicion del modelo para la tabla materiass
  protected $table= 'materia';
  protected $primaryKey='id';
  protected $fillable = [
         'nombre', 'condicion',
  ];  
}
