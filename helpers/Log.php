<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 2018/9/30
 * Time: 12:08
 */

namespace Aplusaccelinc\Helpers;

use Log as _Log;
use function Aplusaccelinc\Functions\clientIP;

class Log
{
    public static $requstAll = '';
    public static function start ($request, $jwt) {
        self::$requstAll = $request->all();
        _Log::info(clientIP() . ' ' . $request->method() . ' ' . $request->fullUrl() . ' ' . $jwt .' ' . json_encode(self::$requstAll));
    }

    public static function success ($request, $jwt) {
        _Log::critial(clientIP() . ' ' . $request->method() . ' ' . $request->fullUrl() . ' ' . $jwt .' ' . json_encode(self::$requstAll));

    }

    public static function  fail ($request, $jwt) {
        _Log::error(clientIP() . ' ' . $request->method() . ' ' . $request->fullUrl() . ' ' . $jwt .' ' . json_encode(self::$requstAll));
    }
}