<?php

namespace App\Http\Controllers;

use App\Team;
use App\User;
use App\User_teams;
use Illuminate\Http\Request;

use App\Http\Requests;

class TeamsController extends Controller
{
    /**
     * @api {post} /v1/teams/store TeamCreate
     * @apiVersion 0.1.0
     * @apiName TeamCreate
     * @apiGroup Teams
     * @apiDescription TeamCreate
     *
     * @apiHeader {string} token
     *
     * @apiParam {string} name
     * @apiParam {int} sport_id
     * @apiParam {string} city Планируется получать из гугла название города/страны
     * @apiParam {file} image
     *
     *
     */
    public function store(Request $request){
        $rules = ['name'=>'required','sport_id'=>'numeric|required','city'=>'required','image'=>'required','user_id'=>false];
        $request->user_id = $request->user->id;
        $team = $this->fromPostToModel($rules, new Team, $request,'model');
        $user_team = new User_teams;
        $user_team->user_id = $request->user->id;
        $user_team->team_id = $team->id;
        $user_team->save();
        return $team;
    }

    
    /**
     * TODO: доделать метод
     */
    /**
     * @api {get} /v1/teams/my MyTeams
     * @apiVersion 0.1.0
     * @apiName MyTeams
     * @apiGroup Teams
     * @apiDescription MyTeams метод не доделан до конца.
     *
     * @apiHeader {string} token
     *
     *
     */
    public function myTeams(Request $request){
        $data['teams'] = User::findorfail($request->user->id)
                            ->teams()
                            ->with('roster','galery','events')
                        ->get();
        //dd($data);
        return $this->helpReturn($data);
    }

    /**
     * @api {get} /v1/teams/my MyTeams
     * @apiVersion 0.1.0
     * @apiName MyTeams
     * @apiGroup Teams
     * @apiDescription MyTeams метод не доделан до конца.
     *
     * @apiHeader {string} token
     *
     *
     */
    public function invite(Request $request){
        $rules = ['user_id'=>'required','team_id'=>'required'];
        $valid = Validator($request->all(),$rules);
        if(!$valid->fails()){
            $user = User::findorfail($request->user_id);
            $team = Team::findorfail($request->team_id);
            $this->sendNotification(
                $request->user_id,
                'Your was invited to team:'.$team->name,
                'invite_to_team',
                $team->id
            );
            return $this->helpInfo();
        }else{
            return $this->helpError('valid',$valid);
        }
    }


}
