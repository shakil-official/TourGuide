<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitinformation extends Model
{
  public function photo()
  {
      return $this->hasMany('App\Photo');
  }

  public function placeType()
  {
    return $this->belongsToMany('App\Placetype');
  }

  public function place()
  {
      return $this->belongsTo('App\Place');
  }
  public function admin()
  {
      return $this->belongsTo('App\Admin');
  }
  public function rating()
  {
      return $this->hasMany('App\Rating');
  }

}
