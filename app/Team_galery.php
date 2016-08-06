<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team_galery extends Model
{
    protected $table = 'team_galery';
    public $timestamps = false;

    public function team(){
        return $this->belongsTo('App\Team');
    }
}
