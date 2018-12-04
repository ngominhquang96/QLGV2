<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    protected $table='users';
    public $timestamps = false;
    public function MyAssignment()
    {
        return $this->belongsToMany('App\assignment');

    }
}
