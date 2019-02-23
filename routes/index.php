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

$router->group(['middleware' => 'undefinedPathMiddleware'], function () use ($router) {
    $router->get('/{any:[\w\/]+}', function () {});
    $router->post('/{any:[\w\/]+}', function () {});
    $router->put('/{any:[\w\/]+}', function () {});
    $router->patch('/{any:[\w\/]+}', function () {});
    $router->delete('/{any:[\w\/]+}', function () {});
    $router->options('/{any:[\w\/]+}', function () {});
});