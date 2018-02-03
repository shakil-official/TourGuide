<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
  public function division()
  {
      return $this->belongsTo('App\Division');
  }

  public function place()
  {
      return $this->hasMany('App\Place');
  }
}
