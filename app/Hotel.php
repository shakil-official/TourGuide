<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
  public function hotelType()
  {
      return $this->belongsTo('App\HotelType');
  }
}
