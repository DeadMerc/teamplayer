<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/',function(){
    return view('welcome');
});

Route::group(['prefix' => 'api'], function () {
    Route::get('{code}', function ($code) {
        $response = ['error' => true, 'message' => null];
        if ($code == 404) {
            $response['response'] = 'Not found token';
        } elseif ($code == 405) {
            $response['response'] = 'Failed token';
        } elseif ($code == 'ban') {
            $response['response'] = 'Your accound was banned';
        } else {
            $response['response'] = 'Dont know error';
        }
        return $response;
    });

    Route::group(['prefix' => 'v1'], function () {
        //Route::resource('users', 'UsersController',['expect'=>['update','show']]);
        Route::post('users/store', 'UsersController@store');
        Route::post('users/auth','UsersController@auth');

        Route::get('users/{id}/profile','UsersController@profile');

        Route::get('data/{type?}','DataController@getData');

        Route::get('nearby','NearbyController@getData');

        Route::get('leagues/{id}','LeaguesController@get');

        Route::group(['middleware' => [\App\Http\Middleware\AuthByToken::class]], function () {
            Route::post('users/update', 'UsersController@update');

            Route::post('teams/store','TeamsController@store');

            Route::post('events/store','EventsController@store');

            Route::get('teams/my','TeamsController@myTeams');
            Route::post('teams/invite','TeamsController@invite');

            Route::post('gallery/upload','GalleryController@upload');

            Route::get('notifies/all','NotifyController@allNotifies');
            Route::get('notifies/fresh/count','NotifyController@countFreshNotifies');
            Route::post('notifies/accept/{id}','NotifyController@accept');
            Route::post('notifies/decline/{id}','NotifyController@decline');
            Route::get('notifies/{type}/{fresh?}','NotifyController@notifyByType');

            Route::post('leagues/store','LeaguesController@store');
            Route::get('leagues/{id}/apply','LeaguesController@apply');

            Route::post('matches/store','MatchesController@store');

        });


    });

});

Route::post('/images/upload','Controller@uploadFile');

Route::get('images/{filename}', function ($filename) {
    $path = storage_path() . '/app/public/images/' . $filename;
    if(file_exists($path)) {
        $file = File::get($path);
        $type = File::mimeType($path);
        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);
    }else{
        $response = array('error'=>true,'message'=>'Not found image');
    }
    return $response;
});