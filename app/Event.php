<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';
    public $timestamps = false;
    public $hidden = ['place_id'];
    public function place(){
        return $this->belongsTo('App\Place');
    }

    public function matches(){
        return $this->hasMany('App\Match','contest_id','id');
    }
    public function status(){
        return $this->belongsTo('App\Status');
    }
}
