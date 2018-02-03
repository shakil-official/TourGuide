<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
  public function district()
  {
      return $this->belongsTo('App\District');
  }
  public function religion()
  {
      return $this->hasMany('App\Religion');
  }
  public function visitinformation()
  {
      return $this->hasMany('App\Visitinformation');
  }
  public function restaurant()
  {
      return $this->hasMany('App\Restaurant');
  }
  public function serviceContact()
  {
      return $this->hasMany('App\ServiceContact');
  }
  public function warning()
  {
      return $this->hasMany('App\Warning');
  }
  public function event()
  {
      return $this->hasMany('App\Event');
  }

}
