<?php

namespace App\Http\Controllers;

use App\Event;
use App\Match;
use App\Match_type;
use App\Status;
use App\Team;
use App\Team_matches;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class EventsController extends Controller
{
    /**
     * @api {post} /v1/events/store EventCreate
     * @apiVersion 0.1.0
     * @apiName EventCreate
     * @apiGroup Events
     * @apiDescription EventCreate
     *
     * @apiHeader {string} token
     *
     * @apiParam {string} [name]
     * @apiParam {datetime} date
     * @apiParam {int} type_id id эвента, должен быть тот, где есть event c объекта match_type
     * @apiParam {file} image
     * @apiParam {int} place_id
     * @apiParam {int="0","1"} public
     * @apiParam {int} team_id ID команды, которая выбрана на экране MyTeams
     *
     * @apiParam {int} [opponent] Отсылается id реальной команды, если её выбрал пользователь
     * @apiParam {string} [opponent_fake] Отсылается название ( имя ) липовой команды
     *
     *
     */
    public function store(Request $request){
        $rules = [
            'name'=>false,
            'date'=>'date|required',
            'type_id'=>'required',
            'place_id'=>'numeric|required|exists:places,id',
            'image'=>'required',
            'public'=>'required',
            'status_id'=> false,
            'user_id'=>false
        ];
        $request->status_id = Status::where('name','prepare')->first()->id;
        $request->user_id = $request->user->id;
        $event = $this->fromPostToModel($rules, new Event, $request,'model');
        $match = new Match;
        $match->type_id = $request->type_id;
        $match->place_id = $request->place_id;
        $match->status_id = Status::where('name','prepare')->first()->id;
        $match->contest_id = $event->id;
        $match->name = 'Match from Event';
        $match->date = $request->date;
        $match->public = $request->public;
        $match->save();

        if($request->opponent){
            $team = Team::findorfail($request->opponent);
            $this->sendNotification(
                $team->creator()->id,
                'Your will be invited to Event match from user:'.$request->user->first_name,
                'invite_to_event',
                $event->id
            );
        }elseif($request->opponent_fake){
            $team = new Team;
            $team->user_id = User::where('first_name','system')->first()->id;
            $team->sport_id = $request->user->sport_id;
            $team->name = $request->opponent_fake;
            $team->is_fake = 1;
            $team->save();

            $this->teamJoinToMatch($team->id,$match->id);
        }

        if($request->team_id){
            $this->teamJoinToMatch($request->team_id,$match->id);
        }
        return $this->helpReturn(
            Event::with('matches','place','status')
            ->findorfail($event->id)
        );
    }
}
