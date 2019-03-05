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
 * $reouter->{RESTful方法名}('/{RESTful方法名 + 动词}', ' {路由一致的命名Controller}@{RESTful方法名 + 动词}')
 * 此种命名规则 同时兼容 RESTful API 与 一般 API 的命名规则
 * 如 增加 user : userController@postAdd
 * 如 登入      ： AuthenticationController@postSignin
 * 如 重取token ： AuthenticationController@postRefresh
 *
 *
 * */

$router->group(['prefix' => 'admin/resource', 'middleware' => ['parameterMiddleware', 'logMiddleware', 'finalResponseMiddleware']], function () use ($router) {
    $router->get('/lottery/show', 'LotteryController@getShow');
    $router->options('/lottery/show', 'LotteryController@getShow'); // Axios 会隐含 打 METHOD 为 options
});

$router->group(['prefix' => 'admin/resource', 'middleware' => ['logMiddleware', 'notAllowedMethodResponseMiddleware']], function () use ($router) {
    $router->post('/lottery/add',  function () {});
    $router->put('/lottery/edit',  function () {});
    $router->patch('/lottery/edit',  function () {});
    $router->delete('/lottery/remove',  function () {});
});

$router->group(['prefix' => 'admin/resource', 'middleware' => 'nonexistentURIResponseMiddleware'], function () use ($router) {
    $router->get('/lottery/{any:[\w\/]+}', function () {});
    $router->post('/lottery/{any:[\w\/]+}', function () {});
    $router->put('/lottery/{any:[\w\/]+}', function () {});
    $router->patch('/lottery/{any:[\w\/]+}', function () {});
    $router->delete('/lottery/{any:[\w\/]+}', function () {});
    $router->options('/lottery/{any:[\w\/]+}', function () {});
});

