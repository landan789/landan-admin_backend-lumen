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
// 考虑 前置中间件 与 后置中间件
// 执行的先后次序是 parameterMiddleware 的 handle 主程序
//              > logMiddleware 的 handle 主程序
//              > Controller的 handle 主程序
//              > responseMiddleware 的 handle 主程序
//              > logMiddleware 的 terminate 主程序


/*
 * 路由规则
 * $reouter->{方法名}('/{控制器一值的名词}/{控制器方法，名词动词名称都可}', ' {路由一致的命名Controller}@{方法名}{控制器方法，名词动词名称都可}')
 *
 *
 * */

$router->group(['middleware' => ['parameterMiddleware', 'logMiddleware', 'responseMiddleware']], function () use ($router) {
    $router->get('/lottery/show', 'LotteryController@getShow');
    $router->options('/lottery/show', 'LotteryController@getShow'); // Axios 会隐含 打 METHOD 为 options
});

$router->group(['middleware' => ['logMiddleware', 'notAllowedMethodMiddleware']], function () use ($router) {
    $router->post('/lottery/add',  function () {});
    $router->put('/lottery/edit',  function () {});
    $router->patch('/lottery/edit',  function () {});
    $router->delete('/lottery/remove',  function () {});
});

$router->group(['middleware' => 'nonexistentURIMiddleware'], function () use ($router) {
    $router->get('/lottery/{any:[\w\/]+}', function () {});
    $router->post('/lottery/{any:[\w\/]+}', function () {});
    $router->put('/lottery/{any:[\w\/]+}', function () {});
    $router->patch('/lottery/{any:[\w\/]+}', function () {});
    $router->delete('/lottery/{any:[\w\/]+}', function () {});
    $router->options('/lottery/{any:[\w\/]+}', function () {});
});

