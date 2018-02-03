<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
//  protected $fillable = ['keep'];
    public function division()
    {
        return $this->hasMany('App\Division');
    }
}
