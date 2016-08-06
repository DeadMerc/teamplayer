<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $table = 'places';
    public $timestamps = false;

    public function creator(){
        return $this->hasOne('App\User');
    }
}
