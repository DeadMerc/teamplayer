<?php

namespace App\Http\Controllers;

use App\League;
use App\Match;
use App\Match_type;
use App\Place;
use App\Status;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class NearbyController extends Controller
{
    /**
     * @api {get} /v1/nearby getData
     * @apiVersion 0.1.0
     * @apiName getData
     * @apiGroup Nearby
     *
     **/
    public function getData(){
        $data = [];

        $leagues = League::where('status_id',Status::where('name','prepare')->first()->id)
                        ->orWhere('status_id',Status::where('name','in_progress')->first()->id)
                        ->get();
        $leagues->sortBy('distance');
        $data['leagues'] = $leagues->values()->all();

        $places = Place::all();
        $places->sortBy('distance');
        $data['locations'] = $places->values()->all();

        $matches = Match::where('status_id',Status::where('name','prepare')->first()->id)
            ->orWhere('status_id',Status::where('name','in_progress')->first()->id)
            ->with('place')
            ->get();
        $matches->sortBy('place.distance');

        $data['matches'] = $matches->values()->all();

        $users = User::all();
        $users->sortBy('distance');
        $data['users'] = $users->values()->all();


        return $this->helpReturn($data);
    }
}
