<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensajes extends Model
{
   //Funcion para poder hacer la definicion del modelo para la tabla mensajes
  protected $table= 'mensajes';
  protected $primaryKey='id';
  protected $fillable = [
        'id_ticket', 'mensaje', 'fecha','numero','id_emisor',
  ]; 
  //Funcion para declarar la relacion entre mensajes y tickets por su modelo
 public function tickets(){
    return $this->belongsTo('App\Tickets');
 }
}
