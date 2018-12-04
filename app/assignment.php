<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class assignment extends Model
{
    protected $table='assignment';
    //protected $primarykey = ['idUser', 'idCourse'];
    public $timestamps = false;
    public function users()
    {
        return $this->belongstoMany('App\users');
    }
}
