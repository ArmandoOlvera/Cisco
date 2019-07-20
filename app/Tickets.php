<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    //
  protected $table= 'tickets';
  protected $primaryKey='id';
    protected $fillable = [
        'id_usuario1', 'id_usuario2', 'asunto','fecha','nuevo','condicion'
    ];
  
  

  public function mensajes(){
       return $this->hasMany('App\Mensajes');
  }
  
  public function users()
    {
        return $this->belongsTo('App\Usuarios');
    }
}
