<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    protected $table = 'leagues';
    public $timestamps = false;
    public $appends = ['distance','standings'];

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

    public function matchesComplete(){
        return $this->hasMany('App\Match','contest_id','id')->where('type_id',Match_type::where('name','league')->first()->id)
            ->where('status_id',Status::where('name','complete')->first()->id);
    }
    public function matchesUpcoming(){
        return $this->hasMany('App\Match','contest_id','id')->where('type_id',Match_type::where('name','league')->first()->id)
            ->where(function ($query){
                $query->where('status_id',Status::where('name','prepare')->first()->id)
                ->orWhere('status_id',Status::where('name','in_progress')->first()->id);
            });
    }

    public function getStandingsAttribute(){
        return [];
    }

    public function getDistanceAttribute(){
        $headers = apache_request_headers();
        $distance = 0;
        if(isset($headers['lat']) and isset($headers['lon'])){
            if($this->attributes['lat'] > 0 AND $this->attributes['lon']>0){
                $a['lat'] = $headers['lat'];
                $a['lon'] = $headers['lon'];
                $b['lat'] = $this->attributes['lat'];
                $b['lon'] = $this->attributes['lon'];
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
