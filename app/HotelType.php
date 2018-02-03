<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotelType extends Model
{
  public function hotel()
  {
      return $this->hasMany('App\Hotel');
  }
}
