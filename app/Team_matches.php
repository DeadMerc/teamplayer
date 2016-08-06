<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team_matches extends Model
{
    protected $table = 'teams_matches';
    public $timestamps = false;

    public function match(){
        return $this->belongsTo('App\Match');
    }
    public function team(){
        return $this->belongsTo('App\Team');
    }
}
