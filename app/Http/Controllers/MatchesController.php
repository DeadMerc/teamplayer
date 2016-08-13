<?php

namespace App\Http\Controllers;

use App\Match;
use Illuminate\Http\Request;

use App\Http\Requests;

class MatchesController extends Controller
{
    /**
     * @api {post} /v1/matches/store MatchCreate
     * @apiVersion 0.1.0
     * @apiName MatchCreate
     * @apiGroup Matches
     *
     * @apiParam {int} type_id From data pack, т.е. тип матча, например он часть лиги, или эвента
     * @apiParam {int} status_id From data pack
     * @apiParam {int} contest_id Сюда отправляется id лиги либо Event по базе
     * @apiParam {string} [name]
     * @apiParam {datetime} [date]
     * @apiParam {int} place_id From data pack
     * @apiParam {file} [image]
     * @apiParam {int} public 0/1
     */
    public function store(Request $request){
        $rules = [
            'type_id'=>'required',
            'status_id'=>'required',
            'contest_id'=>'required',
            'name'=>false,
            'date'=>false,
            'place_id'=>'required',
            'image'=>false,
            'public'=>'required'
        ];
        return $this->fromPostToModel($rules,new Match,$request);
    }
}
