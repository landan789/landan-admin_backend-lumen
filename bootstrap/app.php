<?php

require_once __DIR__.'/../vendor/autoload.php';

try {
    (new Dotenv\Dotenv(__DIR__.'/../'))->load();
} catch (Dotenv\Exception\InvalidPathException $e) {
    //
}

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| Here we will load the environment and create the application instance
| that serves as the central piece of this framework. We'll use this
| application as an "IoC" container and router for this framework.
|
*/

$app = new Laravel\Lumen\Application(
    realpath(__DIR__.'/../')
);

$app->configure('JWT');
$app->configure('RESPONSES');
$app->configure('swoole_http');

$app->withFacades();
$app->withEloquent();

/*
|--------------------------------------------------------------------------
| Register Container Bindings
|--------------------------------------------------------------------------
|
| Now we will register a few bindings in the service container. We will
| register the exception handler and the console kernel. You may add
| your own bindings here if you like or you can make another file.
|
*/

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    App\Console\Kernel::class,
    App\Middleware\LogMiddleware::class
);

/*
|--------------------------------------------------------------------------
| Register Middleware
|--------------------------------------------------------------------------
|
| Next, we will register the middleware with the application. These can
| be global middleware that run before and after each request into a
| route or middleware that'll be assigned to some specific routes.
|
*/

// $app->middleware([
//    App\Http\Middleware\ExampleMiddleware::class
// ]);

 $app->routeMiddleware([
     'corsMiddleware' => App\Middleware\CorsMiddleware::class,
     'logMiddleware' => App\Middleware\LogMiddleware::class,
     'authenticationMiddleware' => App\Middleware\AuthenticationMiddleware::class,
     'nonexistentURIMiddleware' => App\Middleware\NonExistentURIMiddleware::class,
     'notAllowedMethodMiddleware' => App\Middleware\NotAllowedMethodMiddleware::class,
     'parameterMiddleware' => App\Middleware\ParameterMiddleware::class,
     'responseMiddleware' => App\Middleware\ResponseMiddleware::class
 ]);

/*
|--------------------------------------------------------------------------
| Register Service Providers
|--------------------------------------------------------------------------
|
| Here we will register all of the application's service providers which
| are used to bind services into the container. Service providers are
| totally optional, so you are not required to uncomment this line.
|
*/

// $app->register(App\Providers\AppServiceProvider::class);
// $app->register(App\Providers\AuthServiceProvider::class);
// $app->register(App\Providers\EventServiceProvider::class);

/*
|--------------------------------------------------------------------------
| Load The Application Routes
|--------------------------------------------------------------------------
|
| Next we will include the routes file so that they can all be added to
| the application. This will provide all of the URLs the application
| can respond to, as well as the controllers that may handle them.
|
*/

$app->router->group([
    'namespace' => 'App\Controllers',
], function ($router) {
    require __DIR__ . '/../routes/lottery/index.php';
    require __DIR__ . '/../routes/issue/index.php';
    require __DIR__.'/../routes/index.php';  // index.php 这个路由 一定要放最后，有先后次序问题
});

$app->register(SwooleTW\Http\LumenServiceProvider::class);

return $app;
