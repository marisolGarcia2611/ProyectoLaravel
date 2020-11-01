<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class usuarios extends Model
{
     protected $table= "usuarios";
     public function coments()
    {
        return $this->hasMany('App\coments');
    }
}
