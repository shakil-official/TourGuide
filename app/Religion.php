<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Religion extends Model
{
    // protected $fillable = ['keep'];
    public function place()
    {
        return $this->belongsTo('App\Place');
    }
}
