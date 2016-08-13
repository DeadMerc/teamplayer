<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    protected $table = 'leagues';
    public $timestamps = false;
    public $appends = ['distance'];

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
