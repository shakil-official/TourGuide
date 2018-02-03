<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceContact extends Model
{
  public function provider()
  {
      return $this->belongsTo('App\Provider');
  }
  public function place()
  {
      return $this->belongsTo('App\Place');
  }
}
