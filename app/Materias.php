<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materias extends Model
{
        //
  protected $table= 'materia';
  protected $primaryKey='id';
    protected $fillable = [
         'nombre', 'condicion',
    ];
  
  

   
}
