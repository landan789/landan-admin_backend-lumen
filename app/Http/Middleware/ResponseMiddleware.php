<?php
/**
 * Created by PhpStorm.
 * User: LANDAN
 * Date: 2018/9/28
 * Time: 13:13
 */

namespace App\Http\Middleware;

use Closure;

use Aplusaccelinc\Helpers\Jwt;
use Aplusaccelinc\Helpers\Response;

/*
 * 修补 Lumen Route 无法取得 GET parameter 的问题
 */
class ResponseMiddleware
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
     * 后置中间件，统一处理 API 接口回应
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */

    public function handle($oRequest, Closure $cNext){

        $cNext($oRequest);
        $sMessage = $oRequest->input('message') ? strtoupper($oRequest->input('message')) : config('RESPONSES.' . 'IT_IS_UNKNOWN_ERROR' . '.MESSAGE');
        $aData = $oRequest->input('data') ?? [];
        $iTotalCount = $oRequest->input('total_count') ?? 0;
        $sJwt = $oRequest->input('jwt') ?? '';

        $iStatus = $sMessage ? config('RESPONSES.' . $sMessage . '.STATUS') : config('RESPONSES.' . 'IT_IS_UNKNOWN_ERROR' . '.STATUS');
        $json = [
            'result' => config('RESPONSES.' . $sMessage . '.RESULT') ? config('RESPONSES.' . $sMessage . '.RESULT') : config('RESPONSES.' . 'IT_IS_UNKNOWN_ERROR' . '.RESULT'),
            'code' => $sMessage ?  config('RESPONSES.' . $sMessage . '.CODE') : config('RESPONSES.' . 'IT_IS_UNKNOWN_ERROR' . '.CODE'),
            'message' => $sMessage,
            'data' => $aData,
            'total_count' => $iTotalCount,
            'jwt' => $sJwt
        ];

        return response()->json($json, $iStatus);
    }

}
