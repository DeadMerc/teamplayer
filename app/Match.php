<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    protected $table = 'matches';
    public $timestamps = false;

    public function type(){
        return $this->hasOne('App\Match_type');
    }
    public function status(){
        return $this->hasOne('App\Status');
    }

    public function place(){
        return $this->belongsTo('App\Place');
    }
}
