<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_teams extends Model
{
    protected $table = 'users_teams';
    public $timestamps = false;

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function team(){
        return $this->belongsTo('App\Team');
    }
}
