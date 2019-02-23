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

$router->group(['middleware' => 'parameterMiddleware'], function () use ($router) {
    $router->get('/lottery/all', 'LotteryController@getAll');
    $router->options('/lottery/all', 'LotteryController@getAll'); // Axios 会隐含 打 METHOD 为 options
    $router->get('/issue/all', 'IssueController@getAll');

    $router->get('/lottery/all{any}', ['middleware' => 'undefinedPathMiddleware']);
    $router->post('/lottery/all{any}', ['middleware' => 'undefinedPathMiddleware']);
    $router->put('/lottery/all{any}', ['middleware' => 'undefinedPathMiddleware']);
    $router->patch('/lottery/all{any}', ['middleware' => 'undefinedPathMiddleware']);
    $router->options('/lottery/all{any}', ['middleware' => 'undefinedPathMiddleware']);

});

$router->get('/{any}', ['middleware' => 'undefinedPathMiddleware']);
$router->post('/{any}', ['middleware' => 'undefinedPathMiddleware']);
$router->put('/{any}', ['middleware' => 'undefinedPathMiddleware']);
$router->delete('/{any}', ['middleware' => 'undefinedPathMiddleware']);
$router->patch('/{any}', ['middleware' => 'undefinedPathMiddleware']);
$router->options('/{any}', ['middleware' => 'undefinedPathMiddleware']);