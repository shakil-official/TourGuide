<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
  public function serviceContact()
  {
      return $this->hasMany('App\ServiceContact');
  }
}
