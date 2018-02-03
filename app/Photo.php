<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
  public function visit_infos()
  {
      return $this->belongsTo('App\Visitinformation');
  }
}
