<?php

// Software, Middleware, hardware 不可数
namespace App\Middleware;

use Closure;

use helpers\Jwt;
use helpers\Response;

class AfterMiddleware
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
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($oRequest, Closure $cNext) {

        // 「后置中间件（AfterMiddleware）」运行于请求处理之后：
        $oResponse = $cNext($oRequest);
        return $oResponse;
    }
}
