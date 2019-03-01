<?php
/**
 * Created by PhpStorm.
 * User: LANDAN
 * Date: 2018/9/28
 * Time: 13:13
 */

namespace App\Middleware;

use Closure;

use Aplusaccelinc\Helpers\Jwt;
use Aplusaccelinc\Helpers\Response;

class AuthenticationMiddleware
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
        try {

            $sJwt = $oRequest->header('Authorization');

            if (empty($sJwt)) {
                throw new \Exception('JWT_IS_EMPTY');
            }

            $oPayload = Jwt::decode($sJwt);
            $tExp = $oPayload->exp;
            if (time() > $tExp) {
                throw new \Exception('JWT_HAS_EXPIRED');
            }

            return $cNext($oRequest);

        } catch (\Exception $oError) {
            $sMessage = $oError->getMessage() ? $oError->getMessage() : 'JWT_IS_NOT_AUTHORIZED';
            return Response::jsonFail($sMessage, null, 401);

        }

    }
}
