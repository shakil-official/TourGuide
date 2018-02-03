<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Placetype extends Model
{
  protected $fillable = ['place_type_name'];
  public function visitinformation()
  {
    return $this->belongsToMany('App\Visitinformation');
  }
}
