<?php

namespace App\Http\Controllers;

use App\League;
use App\Match_type;
use App\Notification;
use App\Status;
use Illuminate\Http\Request;

use App\Http\Requests;

class LeaguesController extends Controller
{

    /**
     * @api {post} /v1/leagues/store LeagueCreate
     * @apiVersion 0.1.0
     * @apiName LeagueCreate
     * @apiGroup Leagues
     *
     * @apiParam {datetime} date_start
     * @apiParam {datetime} date_stop
     * @apiParam {int} sport_id From data pack
     * @apiParam {int} place_id From data pack
     * @apiParam {int} teams_max
     * @apiParam {string} name
     * @apiParam {string} [description]
     * @apiParam {file} [image]
     * @apiParam {int} [age_min]
     * @apiParam {int} [age_max]
     * @apiParam {string} [level]
     * @apiParam {int} [duration]
     * @apiParam {string} rules
     * @apiParam {int} registration_cost
     * @apiParam {double} lat
     * @apiParam {double} lon
     */
    public function store(Request $request){
        $rules = [
            'date_start'=>'required',
            'date_stop'=>'required',
            'status_id'=>false,
            'sport_id'=>'required',
            'user_id'=>false,
            'place_id'=>'required',
            'teams_max'=>'required',
            'name'=>'required',
            'description'=>false,
            'image'=>false,
            'age_min'=>false,
            'age_max'=>false,
            'level'=>false,
            'duration'=>false,
            'rules'=>'required',
            'registration_cost'=>'required',
            'lat'=>false,
            'lon'=>false
        ];
        $request->status_id = Status::where('name','prepare')->first()->id;
        $request->user_id = $request->user->id;
        $league = $this->fromPostToModel($rules,new League,$request,'model');
        return $this->helpInfo();
    }
    /**
     * @api {get} /v1/leagues/:id League
     * @apiVersion 0.1.0
     * @apiName League
     * @apiGroup Leagues
     * @apiDescription Просмотр экрана League
     *
     */
    public function get(Request $request,$id){
        return $this->helpReturn(League::with('matchesComplete','matchesUpcoming')->findorfail($id));
    }
    /**
     * @api {post} /v1/leagues/:id/apply applyLeague
     * @apiVersion 0.1.0
     * @apiName applyLeague
     * @apiGroup Leagues
     * @apiDescription кнопка apply на экране League
     *
     * @apiParam {int} team_id Команда которая хочет вступить в лигу
     *
     */
    public function apply(Request $request,$id){
        $league = League::findorfail($id);
        $this->sendNotification(
            $league->user_id,
            'Hello, i want to enter your League:'.$league->name,
            'request_to_league',
            $league->id,
            $request->team_id
        );
        return $this->helpInfo();
    }

}
