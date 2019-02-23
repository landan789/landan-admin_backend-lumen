<?php

namespace App\Http\Middleware;

use Closure;

use Aplusaccelinc\Helpers\Jwt;
use Aplusaccelinc\Helpers\Response;

/*
 * 修补 Lumen Route 无法取得 GET parameter 的问题
 */
class ParameterMiddleware
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


        $aParses = parse_url($_SERVER['REQUEST_URI']);
        $sQuery = $aParses['query'] ?? '';

        $aGets = [];
        parse_str($sQuery, $aGets);


        foreach ($aGets as $sKey => $mValue) {
            $GLOBALS['_GET'][$sKey] = $mValue;
            $oRequest->request->add([$sKey => $mValue]);
        }
        return $cNext($oRequest);
    }
}
