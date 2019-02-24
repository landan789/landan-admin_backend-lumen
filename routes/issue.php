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

$router->group(['middleware' => ['parameterMiddleware', 'responseMiddleware', 'logMiddleware', 'nonexistentURIMiddleware']], function () use ($router) {
    $router->options('/issue/all', 'IssueController@getAll'); // Axios 会隐含 打 METHOD 为 options
    $router->get('/issue/all', 'IssueController@getAll');
});