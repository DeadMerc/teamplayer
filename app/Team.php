<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'teams';
    public $timestamps = false;


    public function creator(){
        return $this->hasOne('App\User','id','user_id');
    }
    public function sport(){
        return $this->belongsTo('App\Sport');
    }

    public function roster(){
        return $this->belongsToMany('App\User','users_teams','team_id','user_id');
    }

    public function galery(){
        return $this->hasMany('App\Team_galery');
    }
    public function events(){
        return $this->belongsToMany('App\Event','teams_matches','team_id','match_id');
    }



}
