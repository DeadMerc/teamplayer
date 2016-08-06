<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    public $timestamps = false;
    protected $hidden = ['password','sport_id','role_id','position_id'];

    public function position(){
        return $this->belongsTo('App\Position');
    }
    public function role(){
        return $this->belongsTo('App\Role');
    }
    public function sport(){
        return $this->belongsTo('App\Sport');
    }
    public function teams(){
        return $this->belongsToMany('App\Team','users_teams','user_id','team_id');
        //return $this->hasManyThrough('App\Team','App\User_teams','user_id','team_id','id');
    }
    public function teams_created(){
        return $this->hasMany('App\Team');
    }

}
