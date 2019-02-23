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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->post('-authentication/signin', 'AuthenticationController@postSignin');
$router->post('-authentication/signout', 'AuthenticationController@postSignout');
$router->post('-authentication/signup', 'AuthenticationController@postSignup');



$router->group(['middleware' => 'parameterMiddleware'], function () use ($router) {

});

$router->get('/lottery/all', 'LotteryController@getAll');
$router->options('/lottery/all', 'LotteryController@getAll'); // Axios 会隐含 打 METHOD 为 options
$router->get('/issue/all', 'IssueController@getAll');

$router->group(['middleware' => 'authenticationMiddleware'], function () use ($router) {

    $router->get('user/{user_id}/one', 'UserController@getOne');
    $router->get('user/all', 'UserController@getAll');

});

// TODO 想用 middleware
// TODO 请求 不存在的 path , 回传 request undefined path