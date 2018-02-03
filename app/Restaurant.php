<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
  public function place()
  {
      return $this->belongsTo('App\Place');
  }
}
