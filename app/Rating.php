<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = ['name'];

    public function visitinformation()
    {
        return $this->belongsTo('App\Visitinformation');
    }
    public function admin()
    {
        return $this->belongsTo('App\Admin');
    }
}
