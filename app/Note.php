<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $table = 'notes';
    public $timestamps = false;

    public function match(){
        return $this->belongsTo('App\Match');
    }
}
