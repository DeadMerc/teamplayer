<?php

namespace App\Http\Controllers;

use App\Notification;
use Illuminate\Http\Request;

use App\Http\Requests;

class NotifyController extends Controller
{
    /**
     * @api {get} /v1/notifies/all allNotifies
     * @apiVersion 0.1.0
     * @apiName allNotifies
     * @apiGroup Notifies
     * @apiDescription allNotifies
     *
     * @apiHeader {string} token
     *
     */
    public function allNotifies(Request $request) {
        return $this->helpReturnS(Notification::where('destination', $request->user->id)->first());
    }

    /**
     * @api {get} /v1/notifies/fresh/count CountFreshNotifies
     * @apiVersion 0.1.0
     * @apiName CountFreshNotifies
     * @apiGroup Notifies
     * @apiDescription CountFreshNotifies
     *
     * @apiHeader {string} token
     *
     */
    public function countFreshNotifies(Request $request) {
        return $this->helpReturnS(Notification::where('destination', $request->user->id)->where('see', 0)->get()->count());
    }

    /**
     * @api {get} /v1/notifies/:type/:fresh NotifiesByType
     * @apiVersion 0.1.0
     * @apiName NotifiesByType
     * @apiGroup Notifies
     * @apiDescription NotifiesByType
     *
     * @apiHeader {string} token
     *
     * @apiParam {string="invite_to_event"} type
     * @apiParam {string} [fresh] Если флаг установлен, то будут приходить уведомления, те которые не видел юзер
     *
     */
    public function notifyByType(Request $request, $type, $fresh = false) {
        if ($fresh == false) {
            $notifies = Notification::where('destination', $request->user->id)->where('type', $type)->get();
        } else {
            $notifies = Notification::where('destination', $request->user->id)->where('type', $type)->where('see', 0)->get();
        }
        return $this->helpReturn($notifies);
    }

    /**
     * @api {post} /v1/notifies/accept/:id NotifyAccept
     * @apiVersion 0.1.0
     * @apiName NotifyAccept
     * @apiGroup Notifies
     * @apiDescription Если тип уведомления invite_to_event ТО нужно слать команду, которая выбрана на первом экране MyTeams
     *
     * @apiHeader {string} token
     *
     * @apiParam {int} id ID уведомления
     *
     * @apiParam {int} [team_id]
     *
     */
    public function accept(Request $request, $id) {
        $notify = Notification::findorfail($id);
        if ($notify->destination == $request->user->id) {
            if ($notify->used == 0) {
                if ($notify->type == 'invite_to_event') {
                    if ($request->team_id) {
                        $this->teamJoinToMatch($request->team_id, $notify->param);
                        $notify->used = 1;
                        $notify->save();
                        return $this->helpInfo();
                    } else {
                        return $this->helpError('Check team_id pls');
                    }
                } else {
                    return $this->helpError('Unkown type of notify');
                }
            }else{
                return $this->helpError('This notify used before');
            }
        } else {
            return $this->helpError('It not your notify');
        }
    }
    /**
     * @api {post} /v1/notifies/decline/:id NotifyDecline
     * @apiVersion 0.1.0
     * @apiName NotifyDecline
     * @apiGroup Notifies
     * @apiDescription Change state of notify used to 1
     *
     * @apiHeader {string} token
     *
     * @apiParam {int} id ID уведомления
     *
     *
     */
    public function decline(Request $request, $id) {
        $notify = Notification::findorfail($id);
        if ($notify->destination == $request->user->id) {
            if ($notify->used == 0) {
                $notify->used = 1;
                $notify->save();
                return $this->helpReturn($notify);
            }else{
                return $this->helpError('This notify used before');
            }
        } else {
            return $this->helpError('It not your notify');
        }
    }

}
