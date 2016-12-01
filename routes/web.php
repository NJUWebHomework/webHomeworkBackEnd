<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {
    return $app->version();
});

$app->post('/auth', 'UserController@auth');

$app->group(['prefix' => 'users'],function () use ($app){
    $app->get('/{username}','UserController@getUser');
    $app->get('/{username}/watch','UserController@getWatching');
});



$app->group(['prefix' => 'stat'],function () use ($app){
   $app->post('/{username}/sport','SportDataController@post');
});
