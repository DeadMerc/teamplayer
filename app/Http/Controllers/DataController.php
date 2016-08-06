<?php

namespace App\Http\Controllers;

use App\Match_type;
use App\Place;
use App\Position;
use App\Role;
use App\Sport;
use App\Status;
use Illuminate\Http\Request;

use App\Http\Requests;

class DataController extends Controller
{
    /**
     * @api {get} /v1/data getMainData
     * @apiVersion 0.1.0
     * @apiName getMainData
     * @apiGroup Data
     * @apiDescription getMainData
     *
     *
     *
     *
     */
    public function getData(Request $request,$type = false){
        if($type == false){
            $data['places']['data'] = Place::all();
            $data['places']['hash'] = md5($data['places']['data']->toJson());

            $data['match_type']['data'] = Match_type::all();
            $data['match_type']['hash'] = md5($data['match_type']['data']->toJson());

            $data['positions']['data'] = Position::all();
            $data['positions']['hash'] = md5($data['positions']['data']->toJson());

            $data['sports']['data'] = Sport::all();
            $data['sports']['hash'] = md5($data['sports']['data']->toJson());

            $data['match_type']['data'] = Match_type::all();
            $data['match_type']['hash'] = md5($data['match_type']['data']->toJson());

            $data['status']['data'] = Status::all();
            $data['status']['hash'] = md5($data['status']['data']->toJson());

            $data['roles']['data'] = Role::all();
            $data['roles']['hash'] = md5($data['roles']['data']->toJson());
        }

        return $this->helpReturn($data);
    }
}
