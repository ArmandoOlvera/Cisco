<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table= 'items';
  protected $primaryKey='id';
    public $fillable = ['title','description'];

}
