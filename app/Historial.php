<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    //
  protected $table= 'historial';
  protected $primaryKey='id';
    protected $fillable = [
        'id_academia', 'id_instructor' ,'status', 'fecha_inicio', 'id_materia', 'fecha_oc', 'condicion', 'hora_preferida', 'id_grupo',
    ];
  
  public function academia(){
    return $this->belongsTo('App\Academias');
  }
  public function instructor(){
    return $this->belongsTo('App\Instructores');
  }
  
}
