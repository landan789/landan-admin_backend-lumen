<?php
/**
 * Created by PhpStorm.
 * User: LANDAN
 * Date: 2018/9/28
 * Time: 13:13
 */

namespace App\Middleware;

use Closure;
use App\Helpers\Response;
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

        $oResponse = $cNext($oRequest);

        // 发生错误时, 就 response PHP 预设的资讯
        if (!is_null($oResponse->exception) && true === config('APP.DEBUG')) {
            return $oResponse;
        }

        $oResponseHelper = new Response();

        $sMessage = $oRequest->input('message');
        $aData = $oRequest->input('data') ?? [];
        $iTotalCount = $oRequest->input('total_count') ?? 0;
        $sJwt = $oRequest->input('jwt') ?? '';

        $oResponse = $oResponseHelper->setData($aData)->setMessage($sMessage)->setTotalCount($iTotalCount)->setJwt($sJwt)->json();

        return $oResponse;
    }

}
