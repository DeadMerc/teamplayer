<?php

namespace App\Http\Controllers;

use App\Position;
use App\Role;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Sport;
use App\User;

class UsersController extends Controller
{
    /**
     * @api {post} /v1/users/store Registration
     * @apiVersion 0.1.0
     * @apiName Registration
     * @apiGroup Users
     * @apiDescription Регистрация пользователя
     *
     * @apiParam {string} email
     * @apiParam {string} password
     * @apiParam {int} [role_id] По умолчанию ставятся права обычного пользователя
     *
     */

    public function store(Request $request) {
        $rules = ['email' => 'email', 'password' => 'required', 'token' => false, 'sport_id' => false, 'role_id' => false, 'position_id' => false ];
        if (!User::where('email', $request->email)->first()) {
            $request->sport_id = Sport::orderByRaw("RAND()")->first()->id;
            if (!$request->role_id) {
                $request->role_id = Role::where('grants', 'none')->first()->id;
            }
            //dd(Position::orderByRaw("RAND()")->first()->id);
            $request->position_id = Position::orderByRaw("RAND()")->first()->id;
            $request->token = md5(uniqid());
            $res = $this->fromPostToModel($rules, new User, $request,'bool');
            if ($res) {
                return $this->helpReturn(User::with('position')->with('role')->with('sport')->with('teams')->with('teams_created')->where('token', $request->token)->first());
            } else {
                return $this->helpError('valid', $res);
            }
        } else {
            return $this->helpError('User already registered or email is broken');
        }
    }

    /**
     * @api {post} /v1/users/update UpdateProfile
     * @apiVersion 0.1.0
     * @apiName UpdateProfile
     * @apiGroup Users
     * @apiDescription Обновление информации о пользователе
     *
     * @apiHeader token Token с профиля пользователя, получается при регистрации и авторизации
     *
     * @apiParam {string} [password]
     * @apiParam {int} [role_id] Список прав передаётся отдельно
     * @apiParam {string} [first_name]
     * @apiParam {string} [last_name]
     * @apiParam {int} [sport_id] Вид спорта которым занимается, список передаётся отдельно
     * @apiParam {int} [age]
     * @apiParam {int} [position_id] Позиция в игре ( нападающий, защитник ), передаётся отдельно
     * @apiParam {string="male","female"} [sex]
     * @apiParam {datetime} [date_birth]
     * @apiParam {file} [image] Аватар пользователя
     * @apiParam {string} [android_push_id] В зависимости от системы передаём нужный параметр
     * @apiParam {string} [ios_push_id]
     * @apiParam {string} [time_zone]
     * @apiParam {string} [phone]
     * @apiParam {string} [about]
     * @apiParam {string} [level]
     *
     *
     */
    public function update(Request $request) {
        $rules = ['level'=>false,'about'=>false,'phone'=>false, 'password' => false, 'first_name' => false, 'last_name' => false, 'sport_id' => false, 'age' => false, 'role_id' => false, 'position_id' => false, 'sex' => false, 'date_birth' => false, 'image' => false, 'location' => false, 'android_push_id' => false, 'ios_push_id' => false, 'time_zone' => false, ];
        $res = $this->fromPostToModel($rules, User::findorfail($request->user->id), $request, true);
        if ($res) {
            return $this->helpReturn(User::with('position')->with('role')->with('sport')->with('teams')->with('teams_created')->findorfail($request->user->id));
        } else {
            return $this->helpError('valid', $res);
        }
    }
    /**
     * @api {post} /v1/users/auth Authorization
     * @apiVersion 0.1.0
     * @apiName Authorization
     * @apiGroup Users
     * @apiDescription Authorization user
     *
     * @apiParam {string} email
     * @apiParam {string} password
     *
     */
    public function auth(Request $request){
        $rules = ['email'=>'required','password'=>'required'];
        $valid = Validator($request->all(),$rules);
        if(!$valid->fails()){
            $user = User::with('position')
                ->with('role')
                ->with('sport')
                ->with('teams')
                ->with('teams_created')
                ->where('email',$request->email)
                ->where('password',md5($request->password . 'requestLoginEvstolia'))->first();
            if($user){
                return $this->helpReturn($user);
            }else{
                return $this->helpError('Bad login or password');
            }
        }else{
            return $this->helpError('valid',$valid);
        }
    }
    /*
     * TODO: auth with facebook
     */
    public function authSocial(Request $request){
        $rules = ['first_name'=>'required','social'=>'required'];
    }

    /**
     * @api {get} /v1/users/profile Profile
     * @apiVersion 0.1.0
     * @apiName Profile
     * @apiGroup Users
     * @apiDescription Запрос получения данных для редактирования профиля и для просмотра с экрана nearby
     *
     */
    public function profile(Request $request,$id){
        return $this->helpReturn(User::with('position')->with('role')->findorfail($id));
    }
}
