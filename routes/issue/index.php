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


$router->group(['middleware' => ['parameterMiddleware', 'logMiddleware', 'responseMiddleware']], function () use ($router) {
    $router->get('/issue/show', 'issueController@getShow');
    $router->options('/issue/show', 'issueController@getShow'); // Axios 会隐含 打 METHOD 为 options
});

$router->group(['middleware' => ['logMiddleware', 'notAllowedMethodMiddleware']], function () use ($router) {
    $router->post('/issue/add',  function () {});
    $router->put('/issue/edit',  function () {});
    $router->patch('/issue/edit',  function () {});
    $router->delete('/issue/remove',  function () {});
});

$router->group(['middleware' => 'nonexistentURIMiddleware'], function () use ($router) {
    $router->get('/issue/{any:[\w\/]+}', function () {});
    $router->post('/issue/{any:[\w\/]+}', function () {});
    $router->put('/issue/{any:[\w\/]+}', function () {});
    $router->patch('/issue/{any:[\w\/]+}', function () {});
    $router->delete('/issue/{any:[\w\/]+}', function () {});
    $router->options('/issue/{any:[\w\/]+}', function () {});
});

