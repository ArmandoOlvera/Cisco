<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensajes extends Model
{
    //
  protected $table= 'mensajes';
  protected $primaryKey='id';
    protected $fillable = [
        'id_ticket', 'mensaje', 'fecha','numero','id_emisor',
    ];
  
  
 public function tickets(){
    return $this->belongsTo('App\Tickets');
  }
}
