<?php
/**
 * Created by PhpStorm.
 * User: LANDAN
 * Date: 2018/9/28
 * Time: 13:13
 */

namespace App\Http\Middleware;

use Closure;

class CorsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
//        $headers = [
//            'Access-Control-Allow-Origin'      => '*',
//            'Access-Control-Allow-Methods'     => 'POST, GET, OPTIONS, PUT, DELETE',
//            'Access-Control-Allow-Credentials' => 'true',
//            'Access-Control-Max-Age'           => '86400',
//            'Access-Control-Allow-Headers'     => 'Content-Type, Authorization, X-Requested-With'
//        ];
//
//        if ($request->isMethod('OPTIONS'))
//        {
//            return response()->json('{"method":"OPTIONS"}', 200, $headers);
//        }

//        foreach($headers as $key => $value)
//        {
//            $response->header($key, $value);
//        }

        return $next($request);
    }
}