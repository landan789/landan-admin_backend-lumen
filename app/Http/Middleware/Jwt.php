<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 2018/9/28
 * Time: 14:35
 */

namespace App\Http\Middleware;

use Closure;

class Jwt
{
    public function handle($request, Closure $next, $guard = null)
    {


        return $next($request);
    }
}