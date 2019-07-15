<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instructores extends Model
{
    //
  protected $table= 'instructor';
  protected $primaryKey='id';
    protected $fillable = [
        'id_academia', 'nombre', 'telefono', 'email','apellido','condicion',
    ];
  
  

   public function academias(){
    return $this->belongsTo('App\Academias');
  }
}
