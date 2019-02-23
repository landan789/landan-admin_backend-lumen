<?php

namespace App\Http\Middleware;

use Closure;

use helpers\Jwt;
use helpers\Response;

class LogMiddleware
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

        // 「前置中间件（BeforeMiddleware）」运行于请求处理之前：
        return $cNext($oRequest);
    }

    // HTTP 响应被发送到浏览器之后才运行
    public function terminate($request, $response)
    {
        // 保存 session 数据...
    }
}
