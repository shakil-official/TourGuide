<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
  public function country()
  {
      return $this->belongsTo('App\Country');
  }

  public function district()
  {
      return $this->hasMany('App\District');
  }

}
