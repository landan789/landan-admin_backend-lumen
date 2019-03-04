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

class NotAllowedMethodMiddleware
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

        $oResponseHelper = new Response();

        $sMessage = 'IT_REQUESTS_NOT_ALLOWED_METHOD';
        $aData = [];
        $iTotalCount = 0;
        $sJwt = '';

        $oResponse = $oResponseHelper->setData($aData)->setMessage($sMessage)->setTotalCount($iTotalCount)->setJwt($sJwt)->json();

        return $oResponse;
    }
}
