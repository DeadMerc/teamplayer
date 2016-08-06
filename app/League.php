<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    protected $table = 'leagues';
    public $timestamps = false;

    public function status(){
        return $this->hasOne('App\Status');
    }
    public function sport(){
        return $this->hasOne('App\Sport');
    }
    public function creator(){
        return $this->belongsTo('App\User');
    }
    public function place(){
        return $this->hasOne('App\Place');
    }
}
