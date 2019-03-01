<?php

namespace App\Middleware;

use Closure;

use App\Helpers\Log;

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
        Log::start($oRequest);

        $oResponse = $cNext($oRequest);
//        $sMessage = $oRequest->input('message');
//        if (1 === config('RESPONSES.' . $sMessage . '.RESULT')) {
//            Log::succeed($oRequest);
//            return $oResponse;
//        }
//        Log::fail($oRequest);
        return $oResponse;
    }

    // HTTP 响应被发送到浏览器之后才运行
    public function terminate($oRequest, $oResponse){
        $sMessage = $oRequest->input('message');
        if (1 === config('RESPONSES.' . $sMessage . '.RESULT')) {
            Log::succeed($oRequest);
            return;
        }
        Log::fail($oRequest);
    }
}
