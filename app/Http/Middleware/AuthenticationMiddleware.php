<?php

namespace App\Http\Middleware;

use Closure;

use Aplusaccelinc\Helpers\Jwt;
use Aplusaccelinc\Helpers\Response;

class Authentication
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
    public function handle($request, Closure $next) {
        try {

            $jwt = $request->header('Authorization');

            if (empty($jwt)) {
                throw new \Exception('JWT_IS_EMPTY');
            }

            $payload = Jwt::decode($jwt);
            $exp = $payload->exp;
            if (time() > $exp) {
                throw new \Exception('JWT_HAS_EXPIRED');
            }

            return $next($request);

        } catch (\Exception $e) {
            $message = $e->getMessage() ? $e->getMessage() : 'JWT_IS_NOT_AUTHORIZED';
            return Response::jsonFail($message, null, 401);

        }

    }
}
