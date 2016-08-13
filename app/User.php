<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    public $timestamps = false;
    protected $hidden = ['password','sport_id','role_id','position_id'];
    public $appends = ['distance'];

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

    public function getDistanceAttribute(){
        $headers = apache_request_headers();
        $distance = 0;
        if(isset($headers['lat']) and isset($headers['lon'])){
            if($this->attributes['lat'] > 0 AND $this->attributes['lon'] > 0){
                $a['lat'] = $headers['lat'];
                $a['lon'] = $headers['lon'];
                $b['lat'] = $this->attributes['lat'];
                $b['lon'] = $this->attributes['lon'];
                //dd($this);
                $d = acos(
                    sin($a['lat'])
                    *
                    sin($b['lat'])
                    +
                    cos($a['lat'])
                    *
                    cos($b['lat'])
                    *
                    cos($a['lon']-$b['lon'])
                );
                //dd($d);
                $l = $d * 6371;
                $distance =(int) $l;
            }
        }
        return $distance;
    }

}
