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

$router->group(['middleware' => ['parameterMiddleware', 'responseMiddleware', 'undefinedPathMiddleware']], function () use ($router) {
    $router->get('/lottery/all', 'LotteryController@getAll');
    $router->options('/lottery/all', 'LotteryController@getAll'); // Axios 会隐含 打 METHOD 为 options
    $router->get('/issue/all', 'IssueController@getAll');
});