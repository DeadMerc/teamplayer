<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match_available extends Model
{
    protected $table = 'match_available';
    public $timestamps = false;

    public function match(){
        return $this->belongsTo('App\Match');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
}
