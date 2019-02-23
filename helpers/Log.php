<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 2018/9/30
 * Time: 12:08
 */

namespace helpers;

use Log as _Log;
use function Aplusaccelinc\Functions\clientIP;

class Log {
    public static $requstAll = '';
    public static $channel = 'API';
    public static function start ($request, $jwt) {

        self::$requstAll = $request->all();
         _Log::channel(self::$channel)
             ->info(clientIP() . ' ' . $request->method() . ' ' . $request->fullUrl() . ' ' . $jwt .' ' . json_encode(self::$requstAll));
    }

    public static function succeed ($request, $jwt) {
        _Log::channel(self::$channel)
            ->critical(clientIP() . ' ' . $request->method() . ' ' . $request->fullUrl() . ' ' . $jwt .' ' . json_encode(self::$requstAll));

    }

    public static function  fail ($request, $jwt) {
         _Log::channel(self::$channel)
             ->error(clientIP() . ' ' . $request->method() . ' ' . $request->fullUrl() . ' ' . $jwt .' ' . json_encode(self::$requstAll));
    }
}