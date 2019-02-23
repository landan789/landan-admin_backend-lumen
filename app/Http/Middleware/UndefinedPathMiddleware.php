<?php

namespace App\Http\Middleware;

use Closure;

use helpers\Jwt;
use helpers\Response;

class UndefinedPathMiddleware
{
    /**
     * The authentication guard factory instance.
     *
     * @var \Illuminate\Contracts\Auth\Factory
     */
    /**
     * Create a new middleware instance.
     *
     * @param  \Illuminate\Contracts\Auth\Factory  $auth
     * @return void
     */
    public function __construct( ) {

    }

    /**
     * 后置中间件，统一处理 未定义的 API path 请求
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($oRequest, Closure $cNext) {

        $cNext($oRequest);
        return Response::jsonFail('IT_REQUESTS_UNDEFINED_PATH', null, 404);
    }
}
