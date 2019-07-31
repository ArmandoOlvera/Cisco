<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupos extends Model
{
    //
  protected $table= 'grupos';
  protected $primaryKey='id';
    protected $fillable = [
        'nombre', 'descripcion', 'condicion',
    ];
  
}