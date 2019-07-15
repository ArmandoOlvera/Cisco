<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    //
  protected $table= 'users';
  protected $primaryKey='id';
    protected $fillable = [
        'idrol', 'nombre', 'telefono', 'email','usuario','password', 'condicion','apellido','cargo','pais','extension','idioma',
    ];
  
  

  public function academias(){
     return $this->hasMany('App\Academias');
  
}
}
