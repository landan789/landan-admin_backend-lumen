<?php
/**
 * Created by PhpStorm.
 * User: LANDAN
 * Date: 2018/9/28
 * Time: 13:13
 */

namespace App\Middleware;

use Closure;

use App\Helpers\Jwt;
use App\Helpers\Response;

class AuthenticationResponseMiddleware
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

            $sJwt = $oRequest->header('Authorization') ?? $oRequest->header('authorization');

            if (empty($sJwt)) {
                throw new \Exception('JWT_IS_EMPTY');
            }

            $oPayload = Jwt::decode($sJwt);
            $tExp = $oPayload->exp;
            if (time() > $tExp) {
                throw new \Exception('IT_IS_EXPIRED');
            }

            return $cNext($oRequest);

        } catch (\Exception $oError) {
            $oResponseHelper = new Response();

            $sMessage = $oError->getMessage() ?? 'IT_IS_UNAUTHORIZED';
            $aData = [];
            $iTotalCount = 0;
            $sJwt = '';

            $oResponse = $oResponseHelper->setData($aData)->setMessage($sMessage)->setTotalCount($iTotalCount)->setJwt($sJwt)->json();

            return $oResponse;

        }

    }
}