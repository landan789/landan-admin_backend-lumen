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
// index.php 这个路由 一定要放最后，有先后次序问题

$router->group(['middleware' => 'nonexistentURIMiddleware'], function () use ($router) {
    $router->get('/', function () {});
    $router->get('/{any:[\w\/]+}', function () {});
    $router->post('/{any:[\w\/]+}', function () {});
    $router->put('/{any:[\w\/]+}', function () {});
    $router->patch('/{any:[\w\/]+}', function () {});
    $router->delete('/{any:[\w\/]+}', function () {});
    $router->options('/{any:[\w\/]+}', function () {});
});